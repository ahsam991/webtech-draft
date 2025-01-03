<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit']))
    {
        
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_REQUEST['email']);
        $phone = trim($_REQUEST['phone']);
        $nid = trim($_REQUEST['nid']);
        $pass = trim($_REQUEST['password']);
        $confirmPass = trim($_REQUEST['confirmPassword']);
        $dob = $_REQUEST['dob'];
        $gender = '';
        if (isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
        }
        $address = trim($_REQUEST['address']);
        $medHistory = trim($_REQUEST['medHistory']);
        $emergencyContact = trim($_REQUEST['emergencyContact']);

        ////////////////validation start///////////////

        ////////name validation
        function validateName($name)
        {
            if (strlen($name) < 2 || !ctype_alpha($name))
            {
                return false;
            }
            return true;
        }

        $check_firstName = validateName($firstName);
        $check_lastName = validateName($lastName);

        if(!($check_firstName) || !($check_lastName))
        {
            echo "error in name";
        }


        
        /////// email validation
        $check_email = false;
        if(!empty($email))
        {
            $flag = explode("@", $email);
            if(count($flag) === 2)
            {
                $local = $flag[0];
                $domain = $flag[1];
                if(ctype_alnum(str_replace('.', '', $local)))
                {
                    $flag2 = explode(".", $domain);
                    if(count($flag2) >= 2)
                    {
                        $topLevelDomain = $flag2[count($flag2)-1];
                        if(in_array($topLevelDomain, ["com", "edu", "org", "bd"]))
                        {
                            $check_email = true;
                        }
                    }
                }
            }
        }

        if(!$check_email)
        {
            echo "error in email <br>";
        }


        /////// phone and emergency contact validation
        function validateContact($contact)
        {
            if((strlen($contact) == 11) && (ctype_digit($contact)))
            {
                return true;
            }

            return false;
        }
        
        $check_phone = validateContact($phone);
        $check_emergencyContact = validateContact($emergencyContact);

        if(!($check_phone) || !($check_emergencyContact))
        {
            echo "error in phone <br>";
        }

        /////// nid validation
        $check_nid = false;
        if((strlen($nid) == 10) && (ctype_digit($nid)))
        {
            $check_nid = true;
        }

        else
        {
            echo "error in nid <br>";
        }


        /////// password validation
        $check_password = false;
        if((strlen($pass) >=8))
        {
            $checkChar = false;
            for($i=0; $i<strlen($pass); $i++)
            {
                if($pass[$i] == '@' || $pass[$i] == '#' || $pass[$i] == '*' || $pass[$i] == '&' || $pass[$i] == '%' || $pass[$i] == '$')
                {
                    $checkChar = true;
                    break;
                }
            }

            if($checkChar)
            {
                if($pass === $confirmPass)
                {
                    $check_password = true;
                }
                

            }
        }

        if(!$check_password)
        {
            echo "error in password <br>";
        }

        /////// date of birth validation
        $check_dob = false;
        $birthYear = date('Y', strtotime($dob)); 
        if($birthYear >= 1920 && $birthYear<=2010)
        {
            $check_dob = true;
        }

        else
        {
            echo "error in dob <br>";
        }

        /////// gender validation
        $check_gender = false;
        if(!(empty($gender)))
        {
            $check_gender = true;
        }

        else
        {
            echo "error in gender selection <br>";
        }

        /////// mmedical history and address validation
        
        $check_address = false;
        if(strlen($address) >= 4)
        {
            $check_address = true;
        }

        else
        {
            echo "error in address <br>";
        }
        //////////////validation end//////////////

        $unique = checkUnique($email, $nid);

        if(!$unique)
        {
            echo "the email or nid is already registered <br>";
        }

        else
        {
            if ($check_firstName && $check_lastName && $check_email && $check_phone && $check_nid && $check_password && $check_dob && $check_gender && $check_address && $check_emergencyContact)
            {
                $status = addUser($firstName, $lastName, $email, $phone, $nid, $pass, $dob, $gender,$address, $medHistory, $emergencyContact);

                if($status)
                {
                    header("Location: ../view/login.html");
                }
                /*else
                {
                    header("Location: ../view/sign_up.html");
                }*/
            }
        }    
    }
?>

