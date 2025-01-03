<?php
    session_start();
    require_once('../model/loginModel.php');

    if(isset($_REQUEST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userType = $_POST['userType'];

        // Input validation
        if (empty($email) || empty($password))
        {
            echo "All fields are required.";
            var_dump($_POST);
            //header("Location: ../view/login.html");
            exit;
        }

        // Fetch user based on type
        $user = getUser($email, $password, $userType);

        if ($user)
        {
            $_SESSION['email'] = $email;
            $_SESSION['type'] = $userType;
            setcookie('status', 'true', time() + 3000, '/');

            if ($userType === 'patient')
            {
                header("Location: ../view/patientDashboard.php");

            }
            
            if ($userType === 'doctor')
            {
                header("Location: ../view/doctorDashboard.php");
            }
            
            if ($userType === 'admin')
            {
                header("Location: ../view/adminDashboard.php");
            }
            exit;

        }
        
        else
        {
            echo "Invalid email or password";
            //header("Location: ../view/login.html");
            exit;
        }
    }

    else
    {
        echo "Unauthorized access.";
        //header("Location: ../view/login.html");
        exit;
    }
?>
