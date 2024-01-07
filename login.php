<?php
declare(strict_types=1);

session_start();

$result = null;
if (isset($_SESSION['email'])) {
    $result = $_SESSION['email'];

    unset($_SESSION['email']);
}

if (isset($_GET['kirish'])) {
    $_SESSION['kirish'] = "kirish";
}

if (isset($_GET['TizimgaKirish'])) {
    $_SESSION['TizimgaKirish'] = "TizimgaKirish";
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
    <title>Login</title>
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
                                echo "<div class='alert alert-danger' >"
                                    . $_SESSION['error'] .
                                    "</div>";
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['parolLogon'])) {
                                echo "<div class='alert alert-danger' >"
                                    . $_SESSION['parolLogon'] .
                                    "</div>";
                                unset($_SESSION['parolLogon']);
                            }
                            if (isset($_SESSION['email_error'])) {
                                echo "<div class='alert alert-danger' >"
                                . $_SESSION['email_error'] .
                                "</div>";

                                unset($_SESSION['email_error']);
                            }
                            if (isset($_SESSION['parolerror'])) {
                                echo "<div class='alert alert-danger' >"
                                    . "Parol xato" .
                                    "</div>";

                                unset($_SESSION['parolerror']);
                            }
                            ?>
                            <div class="col-md-10 col-lg-10 col-xl-8 order-4 order-lg-2">
                                <form method="post" action="userLogin.php">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="userEmailInput">Login</label>
                                        <input type="email" name="email" id="userEmailInput" placeholder="email*"
                                               class="form-control" value="<?= $result ?>"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="user-password">Password</label>
                                        <input type="password" name="password" id="user-password" placeholder="Parol*"
                                               class="form-control"/>
                                    </div>

                                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4">
                                        Kirish
                                    </button>
                                </form>
                                <div style="position: absolute; left: 128px; bottom: 20px">
                                    <a class="nav-link" href="register.php?adminAccount">Ro'yxatdan o'tish</a>
                                </div>
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


