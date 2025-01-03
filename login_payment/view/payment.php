<?php
session_start();
require_once '../model/database.php';

// Fetch the user's email from the session or database
$user_email = '';
if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];
} else {
    // Fetch from database if not set in session
    $conn = getConnection();
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session
    $sql = "SELECT email FROM user_info WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $user_email = $row['email'];
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="../asset/style_payment.css">
    <script>
        function validateForm() {
            // Name validation
            const name = document.getElementById("name").value;
            const cardholderName = document.getElementById("cardholdername").value;
            const nameRegex = /^[a-zA-Z\s]+$/;
            if (!nameRegex.test(name) || !nameRegex.test(cardholderName)) {
                alert("Name and Cardholder Name should contain only letters.");
                return false;
            }

            // CVV validation
            const cvv = document.getElementById("cvv").value;
            const cvvRegex = /^[0-9]{3}$/;
            if (!cvvRegex.test(cvv)) {
                alert("CVC/CVV should be a 3 digit number.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="../controller/process_payment.php" method="POST" onsubmit="return validateForm();">
            <div class="price">
                <h1>Select your Payment method</h1>
            </div>
            <div class="card__container">
                <div class="card">
                    <div class="row paypal">
                        <div class="left">
                            <input id="pp" type="radio" name="payment_method" value="paypal" />
                            <div class="radio"></div>
                            <label for="pp">Mobile Banking</label>
                        </div>
                        <div class="right">payment</div>
                    </div>
                    <div class="row credit">
                        <div class="left">
                            <input id="cd" type="radio" name="payment_method" value="card" />
                            <div class="radio"></div>
                            <label for="cd">Debit/ Credit Card</label>
                        </div>
                        <div class="right">
                            <img src="http://i66.tinypic.com/5knfq8.png" alt="visa" />
                            <img src="../asset/mastercard.png" alt="mastercard" />
                        </div>
                    </div>
                    <div class="row cardholder">
                        <div class="info">
                            <label for="name">Name</label>
                            <input name="name" placeholder="e.g. John Doe" id="name" type="text" required />
                        </div>
                    </div>
                    <div class="row email">
                        <div class="info">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" value="<?php echo htmlspecialchars($user_email); ?>" readonly required />
                        </div>
                    </div>
                    <div class="row cardholder">
                        <div class="info">
                            <label for="cardholdername">Name on Card</label>
                            <input name="cardholder_name" placeholder="e.g. Richard Bovell" id="cardholdername" type="text" required />
                        </div>
                    </div>
                    <div class="row number">
                        <div class="info">
                            <label for="cardnumber">Card number</label>
                            <input name="card_number" id="cardnumber" type="text" maxlength="19" placeholder="8888-8888-8888-8888" required />
                        </div>
                    </div>
                    <div class="row details">
                        <div class="left">
                            <label for="expiry-month">Expiry</label>
                            <select name="expiry_month" id="expiry-month" required>
                                <option value="">MM</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <span>/</span>
                            <select name="expiry_year" id="expiry-year" required>
                                <option value="">YYYY</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                        </div>
                        <div class="right">
                            <label for="cvv">CVC/CVV</label>
                            <input name="cvv" id="cvv" type="text" maxlength="3" placeholder="123" required />
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit"><i class="ion-locked"></i> Confirm and Pay</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>