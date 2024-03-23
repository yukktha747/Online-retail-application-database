<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = '587.yus21cs@cmrit.ac.in';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@example.com';
    $mail->Password   = 'yukktha@01';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('yus21cs@cmrit.ac.in', 'Your Name');
    $mail->addAddress('yukkthas@gmail.com', 'Recipient Name');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email.';

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}
?>
