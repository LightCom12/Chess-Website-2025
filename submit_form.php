<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Enable error reporting (disable on production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $uscf = htmlspecialchars($_POST['uscf'] ?? 'N/A');
    $fide = htmlspecialchars($_POST['fide'] ?? 'N/A');
    $online = htmlspecialchars($_POST['online'] ?? 'N/A');
    $experience = htmlspecialchars($_POST['experience']);

    // Email content
    $subject = "New Program Registration";
    $body = "
        Name: $name\n
        Email: $email\n
        Phone: $phone\n
        USCF Rating: $uscf\n
        FIDE Rating: $fide\n
        Online Rating: $online\n
        Experience: $experience\n
    ";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chessgurusaz@gmail.com';  // your Gmail address
        $mail->Password = 'gyusctriycztkoki'; // your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = 0;  // 0 = off, 2 = debug

        // Recipients
        $mail->setFrom('chessgurusaz@gmail.com', 'Chess Gurus');
        $mail->addAddress('chessgurusaz@gmail.com', 'Chess Gurus');  // Your inbox
        $mail->addReplyTo($email, $name);  // Allow direct reply to sender

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        $mail->send();

        // Redirect to thank you page
        header("Location: ./thank_you.html");
        exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo "Invalid request.";
}
