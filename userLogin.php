<?php

declare(strict_types=1);

session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        include "datebaza/data_baze.php";

        $sql_select = "select * from news.user where email = :email";
        $state = $dns->prepare($sql_select);
        $state->execute(['email' => $email]);

        if ($state->rowCount() > 0) {
            $user = $state->fetch();

            if (password_verify($password, $user['password'])) {
                $_SESSION['ok'] = "Ok";
                $_SESSION['user'] = "user";
            } else {
                $_SESSION['parolerror'] = "Parolni xato kiritingiz tekshirib qaytadan kiriting";
                $_SESSION['email'] = $email;
            }

        } else {
            $_SESSION['email'] = $email;
            $_SESSION['error'] = "Bunday email foydalanuvchi mavjud emas!";
        }

    } else if (!empty($email)) {
        $_SESSION['email'] = $email;
        $_SESSION['parolLogon'] = "parolni kiriting";
    } else if (!empty($password)) {
        $_SESSION['email_error'] = "emailni kiriting";
    } else {
        $_SESSION['error'] = "email va parolni kiriting";
    }
}
if (isset($_SESSION['ok'])) {
    echo $_SESSION['ok'];

    unset($_SESSION['ok']);

    header('Location: index.php');
} else {
    header('Location: login.php');
}

