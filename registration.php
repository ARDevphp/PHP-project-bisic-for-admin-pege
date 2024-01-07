<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/sort_asc_desc.php';
include "datebaza/data_baze.php";

if (isset($_POST['submit'])) {

    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['email'] = $_POST['email'];

    if (!empty($_POST['firstname']) && !empty($_POST['lastname'])
        && !empty($_POST['email']) && !empty($_POST['password'])
        && !empty($_POST['confirm-password'])) {

        $firstname = clearText($_POST['firstname']);
        $lastname = clearText($_POST['lastname']);
        $email = clearText($_POST['email']);
        $password = clearText($_POST['password']);
        $confirm_password = clearText($_POST['confirm-password']);

        $_SESSION['password'] = $password;

        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {

            $_SESSION['error'] = "Ism faqat xarflardan tashkil topsin";
            header('Location: register.php');

        } else if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {

            $_SESSION['error'] = "Familya faqat xariflardan tashkil topsin";
            header('Location: register.php');

        } else if ($password != $confirm_password) {

            $_SESSION['error'] = "Parol bir xil bo'lishi kerak";
            header('Location: register.php');

        } else if (strlen($password) < 6) {

            $_SESSION['error'] = "Parol 6 tadan kam bo'lmasin";
            header('Location: register.php');

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION['error'] = "pochta xato kiritildi";
            header('Location: register.php');

        } else {
            $state = $dns->prepare('select * from news.user where email = :email');
            $state->bindValue('email', $email);
            $state->execute();
            if ($state->rowCount() > 0) {
                $_SESSION['error'] = 'Bu pochtadan foydalanilgan';
                header('Location: register.php');
            } else if (empty($_SESSION['rand'])) {
                header('Location: newUser.php');
            }
        }
    } else {
        $_SESSION['error'] = "Iltimos maydonlarni to'ldiring";
        header('Location: register.php');
    }
}