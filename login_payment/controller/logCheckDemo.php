<?php
    session_start();
    require_once('../model/userModel.php');

    if(isset($_REQUEST['login']))
    {

        $email = trim($_POST['email']);
        $password = trim($_REQUEST['password']);

        if(empty($password))
        {
            echo "Null username/password!";
        }
        
        else
        {
            $status = login($email, $password);
            if($status)
            {
                $_SESSION['email'] = $email;
                setcookie('status', 'true', time()+3000, '/');
                header('location: ../view/appointmentBooking.php');
            }
            
            else
            {
                echo "Invalid user!";
            }
        }
    }
    
    else
    {
        header('location: ../view/sign_up.html');
    }

?>