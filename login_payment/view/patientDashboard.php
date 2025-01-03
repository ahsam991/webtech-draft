<!DOCTYPE html>
<html>
    <head>
        <title>Patient Dashboard</title>
    </head>
    <body>
        <h1>PATIENT DASHBOARD</h1>
        <!-- Button that redirects to another page -->
        <button onclick="redirectToPayment()">Pay Here</button>

        <script>
            // JavaScript function to handle the redirection
            function redirectToPayment() {
                window.location.href = "payment.php"; // Replace with the actual URL
            }
        </script>
    </body>
</html>