<?php

    function getConnection()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
        return $conn;
    }

    function login($email, $password)
    {
        $conn = getConnection();
        $sql = "select * from user_info where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1)
        {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
            return true;
        }

        else
        {
            return false;
        }
    }

    function addUser($first_name, $last_name, $email, $phone, $nid, $pass, $dob, $gender, $address, $med_history, $emergency_contact)
    {
        $conn = getConnection();
        $sql = "insert into user_info VALUES('{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$nid}', '{$pass}', '{$dob}', '{$gender}' , '{$address}', '{$med_history}', '{$emergency_contact}')";
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }

    function checkUnique($email, $nid)
    {
        $conn = getConnection();
        $checkSql = "SELECT * FROM user_info WHERE email = '{$email}' OR nid = '{$nid}'";
        $checkResult = mysqli_query($conn, $checkSql);
        if(mysqli_num_rows($checkResult) > 0)
        {
            mysqli_close($conn);
            return false;
        }
        return true;
    }

?>