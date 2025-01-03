<?php
session_start();
require_once('../model/appointBookingModel.php');
if (isset($_REQUEST['book']))
{
    $problem = $_REQUEST['problem'];
    $doctor = $_REQUEST['doctor'];
    $date = $_REQUEST['date'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    if (empty($problem) || empty($doctor) || empty($date))
    {
        echo "All fields are required!";
        exit;
    }

    $tokenCount = checkAppointmentSlot($doctor, $date);

    if ($tokenCount >= 30)
    {
        echo "Sorry, the slot is full. Please select another time or date.";
    }

    else
    {
        $result = bookAppointment($name, $email, $problem, $doctor, $date);
        if($result)
        {
            echo "Appointment booked successfully. Your token number is: " . ($tokenCount + 1);
        }

        else
        {
            echo "Error booking the appointment Or you have already requested for an appointment.";
        }
    }
}
?>
