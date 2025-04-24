<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'chessgurusaz@gmail.com'; // Your email
    $mail->Password = 'your-app-password'; // Your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email headers
    $mail->setFrom('chessgurusaz@gmail.com', 'Chess Gurus');
    $mail->addAddress('your-email@example.com'); // Replace with your email
    $mail->Subject = 'Test Email';
    $mail->Body    = 'azchessgurus@gmail.com';

    // Send email
    if ($mail->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Email failed to send!';
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
