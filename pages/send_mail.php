<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $business = htmlspecialchars($_POST["business_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $service = htmlspecialchars($_POST["service"]);
    $message = htmlspecialchars($_POST["message"]);


    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['MAIL_USERNAME']; // or getenv('MAIL_USERNAME');
        $mail->Password   = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($_ENV['MAIL_USERNAME'], 'Kaidevs Website');

        $recipients = explode(',', $_ENV['MAIL_TO']);
        foreach ($recipients as $recipient) {
            $mail->addAddress(trim($recipient));
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Message from Kaidevs Website";
        $mail->Body    = "
            <h1>New Contact Form Submission</h1>
            <h2><strong>Name:</strong> {$name}</h2>
            <h2><strong>Business Name:</strong> {$business}</h2>
            <h2><strong>Email:</strong> {$email}</h2>
            <h2><strong>Interested Service:</strong> {$service}</h2>
            <h2><strong>Message:</strong><br>{$message}</h2>
        ";

        $mail->send();
        header('Location: contact.php?success=1');
        exit();
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        header('Location: contact.php?error=1');
        exit();
    }
}
?>
