<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$envPath = dirname(__DIR__);
if (file_exists($envPath . '/.env')) {
    Dotenv::createImmutable($envPath)->safeLoad();
}

function SendMail($email, $subject, $message) {
    $sender = $_ENV['EMAIL_APP_EMAIL'] ?? getenv('EMAIL_APP_EMAIL');
    $pass   = $_ENV['EMAIL_APP_PASSWORD'] ?? getenv('EMAIL_APP_PASSWORD');
    
    if (empty($sender) || empty($pass)) {
        return false;
    }
    
    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $sender;
        $mail->Password = $pass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($sender, 'GoGym');
        $mail->addAddress($email);

        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->send();
    } catch (Exception $e) {
        return false;
    }
}