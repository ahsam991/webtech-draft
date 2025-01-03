<?php
session_start();
if (!isset($_SESSION['email'])) 
{
    header('location: ../view/login.html');
    exit;
} 

else
{
?>
<html>
<head>
    <title>Appointment Booking</title>
</head>
<body>
    <form method="post" action="../controller/appointBookingCheck.php">
        <div class="appointment_book">
            <div>
                <label>Name: <?php echo ($_SESSION['name']); ?></label><br>
                <label>Email: <?php echo ($_SESSION['email']); ?></label><br>
                <label>Problem: </label>
                <input type="text" name="problem"><br>

                <label>Choose Doctor: </label>
                <select name="doctor">
                    <option value="">Select Doctor</option>
                    <?php
                        include('../model/appointBookingModel.php');
                        selectDoctor();
                    ?>
                </select><br>

                <label>Appointment Date:</label>
                <?php
                    $currentDate = date("Y-m-d");
                    $maxDate = date("Y-m-d", strtotime("+7 days"));
                ?>
                <input type="date" name="date" min="<?php echo $currentDate; ?>" max="<?php echo $maxDate; ?>"><br>
            </div>
            <input type="submit" name="book" value="Place Booking">
        </div>
    </form>
</body>
</html>
<?php
}
?>
