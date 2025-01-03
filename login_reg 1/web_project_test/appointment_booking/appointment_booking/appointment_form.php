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
               
                $conn = new mysqli('localhost', 'root', '', 'project');

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
        <input type="date" id="date" name="date" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>