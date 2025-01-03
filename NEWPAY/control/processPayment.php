<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $cardNumber = preg_replace('/\s+/', '', $_POST['card_number']);
    $expiryMonth = intval($_POST['expiry_month']);
    $expiryYear = intval($_POST['expiry_year']);
    $cvv = $_POST['cvv'];

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Validate card number
    if (!ctype_digit($cardNumber) || strlen($cardNumber) < 16 || strlen($cardNumber) > 19) {
        $errors[] = "Invalid card number.";
    }

    // Validate expiry date
    $currentYear = date("Y");
    $currentMonth = date("n");
    if ($expiryYear < $currentYear || ($expiryYear == $currentYear && $expiryMonth < $currentMonth)) {
        $errors[] = "Expiry date must be in the future.";
    }

    // Validate CVV
    if (!ctype_digit($cvv) || strlen($cvv) != 3) {
        $errors[] = "Invalid CVV.";
    }

    if (empty($errors)) {
        echo "Payment successfully processed!";
        // You can now proceed with payment processing
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>