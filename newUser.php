<?php

declare(strict_types=1);

ini_set("SMTP", "ssl://smtp.gmail.com");
ini_set("smtp_port", "587");
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once "datebaza/sort_asc_desc.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail = new PHPMailer();


if (isset($_SESSION['email']) || isset($_GET['ortga'])) {
    $email = $_SESSION['email'];
    $_SESSION['kod'] = rand_number();
    $rand = $_SESSION['kod'];

    $ism = $_SESSION['firstname'];
    $login = $_SESSION['email'];
    $password = $_SESSION['password'];

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abdulazizmirzo8@gmail.com';
    $mail->Password = 'kazcenztaytukzdp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('Yangiliklar: abdulazizmirzo8@gmail.com');
    $mail->addAddress($email);
    $mail->Subject = "So'ngi Yangiliklar va qiziqarli kitoblar Avto olam barchasi bizda";
    $mail->Body = "Saytdan o'tish uchun tasdiqlash kodi < $rand > Saytga kiris uchun Login $login va Parol $password";

    try {
        $mail->send();
        header('Location: sms.php');
    } catch (Exception $e) {
        unset($rand);
        header('Location: register.php');
    }
}



