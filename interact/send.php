<?php

include '../connect.php';

$display_product = "select * from `cart`";
$num = 0;
$totalPrice = 0;
$price = 0;
$result = mysqli_query($conn, $display_product);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $Price = 0;

        $price = $row['price'];
        $totalPrice += $price;
    }
}

use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    // Sanitize and validate input values
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aregpaul@gmail.com'; // Your Gmail username
    $mail->Password = 'jpmrroytqntcsrra'; // Your Gmail password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('aregpaul@gmail.com'); // Set the sender's email address
    $mail->addAddress('aregpaul@gmail.com'); // Add the recipient's email address
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"]; // Set the email subject
    $mail->Subject = "New Payment"; // Set the email subject (overwrite the previous subject)
    $mail->Body .= "Full Name:<br>". $_POST["name"] . "<br><br>"; // Add the full name to the email body
    $mail->Body .= "Email:<br>". $_POST["email"] . "<br><br>"; // Add the email address to the email body
    $mail->Body .= "Total Amount:<br>$". $totalPrice . "<br><br>"; // Add the total amount to the email body

    $mail->send(); // Send the email
    echo "<script>alert('Sent Successfully'); document.location.href = '../views/cart.php'</script>"; // Display a success message and redirect to the cart page
}
