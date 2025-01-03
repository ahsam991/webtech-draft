<?php
    session_start();
    function getConnection()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'web_project');
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    function selectDoctor()
    {
        $conn = getConnection();

        $sql = "SELECT name, available_time FROM doctor";
        $result = mysqli_query($conn, $sql);

        if ($result === false)
        {
            echo "Error in query: " . mysqli_error($conn);

        }
        
        else
        {
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<option value=\"{$row['name']} ({$row['available_time']})\">Dr. {$row['name']} ({$row['available_time']})</option>";
                }
            }
            
            else
            {
                echo "<option>No doctors available</option>";
            }
        }
        mysqli_close($conn);
    }

    function checkAppointmentSlot($doctor, $date)
    {
        $conn = getConnection();
        $sql = "SELECT COUNT(*) as token_count FROM appointments WHERE doctor = '{$doctor}' AND appointment_date = '{$date}'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        return $row['token_count'];
    }

    function bookAppointment($name, $email, $problem, $doctor, $date)
    {
        $conn = getConnection();
        $sql = "insert into appointments VALUES('{$name}', '{$email}', '{$problem}', '{$doctor}', '{$date}')";
        
        $checkSql = "SELECT * FROM appointments WHERE email = '{$email}'";
        $checkResult = mysqli_query($conn, $checkSql);
        if (mysqli_num_rows($checkResult) > 0) {
            mysqli_close($conn);
            return false;
        }

        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }
    
?>
