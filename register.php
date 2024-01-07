<?php

declare(strict_types=1);

session_start();

$firstname = null;
$lastname = null;
$email = null;

if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['email'])) {
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $email = $_SESSION['email'];

    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['email']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<section class="vh-100" style="background-color: #ddd;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-7">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo "<div class='alert alert-danger' role='alert'>"
                                    . $_SESSION['error'] .
                                    "</div>";
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) {
                                unset($_SESSION['success']);

                                header('Location: newUser.php');
                            }
                            ?>
                            <div class="col-md-10 col-lg-12 col-xl-10 order-4 order-lg-2">
                                <form method="post" action="registration.php">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstname">Ism*</label>
                                                <input type="text" name="firstname" id="firstname"
                                                       class="form-control"  value="<?=$firstname?>"/>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="lastname">Familya</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?=$lastname?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="userEmailInput">Email pochta*</label>
                                        <input type="email" name="email" id="userEmailInput" class="form-control"  value="<?=$email?>"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="user-password">Parol*</label>
                                        <input type="password" name="password" id="user-password" class="form-control"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="confirm-password">Confirm parol*</label>
                                        <input type="password" name="confirm-password" id="confirm-password"
                                               class="form-control"/>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                                        Yuborish
                                    </button>
                                    <div style="position: absolute; left: 80px; bottom: 20px">
                                        <a class="nav-link" href="login.php">Kirish</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

