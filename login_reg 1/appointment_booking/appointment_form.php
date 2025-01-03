<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
</head>

<body>
    <h1>Book Your Appointment</h1>
    <form action="submit_appointment.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="problem">Problem:</label>
        <input type="text" id="problem" name="problem" required><br><br>

        <label for="doctor">Choose Doctor:</label>
        <select id="doctor" name="doctor" required>
            <option value="">-- Select Doctor --</option>
            <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'web_project');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT name, available_time FROM doctor";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Error in query: " . $conn->error;
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"{$row['name']} ({$row['available_time']})\">Dr. {$row['name']} ({$row['available_time']})</option>";
                    }
                } else {
                    echo "<option>No doctors available</option>";
                }

                $conn->close();
            ?>
        </select><br><br>

        <label for="date">Appointment Date:</label>
        <?php
            
            $today = date("Y-m-d"); // current date
            $maxDate = date("Y-m-d", strtotime("+7 days"));  // 7 days added with current date
        ?>
        <input type="date" id="date" name="date" required min="<?php echo $today; ?>" max="<?php echo $maxDate; ?>"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
