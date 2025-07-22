<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // BOT SPAM DETECTION

    if (!empty($_POST['website'])) {
        // Honeypot field is filled => bot detected
        header('Location: contact.php?error=spam');
        exit();
    }

    // Time-based bot protection
    $renderedTime = isset($_POST['form_rendered']) ? (int)$_POST['form_rendered'] : 0;
    $currentTime = time();

    if (($currentTime - $renderedTime) < 10) {
        header('Location: contact.php?botdetected');
        exit();
    }


    // Sanitize inputs
    $name = htmlspecialchars($_POST["name"]);
    $business = htmlspecialchars($_POST["business_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $service = htmlspecialchars($_POST["service"]);
    $message = htmlspecialchars($_POST["message"]);

     
    // Check for spammy links in the message
    if (preg_match('/https?:\/\/|www\.|\.com|\.net|\.xyz/i', $message)) {
        header('Location: contact.php?linkdetected');
        exit();
    }


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
