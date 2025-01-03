<?php
session_start();
require_once '../model/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];
    $cvv = $_POST['cvv'];

    // Server-side validation for name and cardholder name
    if (!preg_match("/^[a-zA-Z\s]+$/", $name) || !preg_match("/^[a-zA-Z\s]+$/", $cardholder_name)) {
        die("Name and Cardholder Name should contain only letters.");
    }

    // Server-side validation for CVV
    if (!preg_match("/^[0-9]{3}$/", $cvv)) {
        die("CVC/CVV should be a 3 digit number.");
    }

    // Insert payment details into the payment table
    $conn = getConnection();
    $sql = "INSERT INTO payment (user_email, payment_method, name, cardholder_name, card_number, expiry_month, expiry_year, cvv) VALUES ('$email', '$payment_method', '$name', '$cardholder_name', '$card_number', $expiry_month, $expiry_year, '$cvv')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Payment successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>