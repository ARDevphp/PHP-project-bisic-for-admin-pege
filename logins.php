<?php

declare(strict_types=1);
include 'datebaza/data_baze.php';

session_start();

if (isset($_POST['kod'])) {
    if (isset($_POST['user_kod']) && !empty($_POST['user_kod']) && isset($_SESSION['kod'])) {
        $email_kod = $_SESSION['kod'];
        $user_kod = $_POST['user_kod'];

        if ($email_kod == $user_kod) {
            $_SESSION['user'] = "user";

            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
                $role = 'author';

                $password = password_hash($password, PASSWORD_DEFAULT);
                $state = $dns->prepare(
                    "insert into news.user (email, password, firstname, lastname,role) 
                   values (:email, :password, :firstname, :lastname, :role)"
                );

                try {
                    $state->execute(['email' => $email, 'password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'role' => $role]);
                    $_SESSION['success'] = "Muoffaqiyatli ro'yxatdan o'tdingiz";
                    $_SESSION['user'] = 'user';
                    unset($_SESSION['kod']);

                    header('Location: index.php');
                    exit();
                } catch (PDOException $e) {
                    $_SESSION['error'] = $e->getMessage();
                }
            } else {
                header('Location: sms.php');
            }
        } else {
            $_SESSION['xato'] = "Kod noto'g'ri kiritildi";
            header('Location: sms.php');
        }
    } else {
        $_SESSION['xato1'] = "Iltimos kodni kiriting";
        header('Location: sms.php');
    }
}