<?php
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['email'];
$problem = $_POST['problem'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];


$sql = "SELECT COUNT(*) as token_count FROM appointments WHERE doctor='$doctor' AND appointment_date='$date'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['token_count'] >= 7) {
    echo "Sorry the slot is full. Select another time or date.";
} else {
    $stmt = $conn->prepare("INSERT INTO appointments (name, id, email, problem, doctor, appointment_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $id, $email, $problem, $doctor, $date);

    if ($stmt->execute()) {
        echo "Appointment booked successfully. Your token number is: " . ($row['token_count'] + 1);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
