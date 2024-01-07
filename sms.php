<?php

declare(strict_types=1);

session_start();
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
    <link href="style.css" rel="stylesheet">
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
                            <div class="col-md-10 col-lg-10 col-xl-8 order-4 order-lg-2">
                                <p class="form-label" for="user-kod">
                                    <?php
                                    if (isset($_SESSION['xato'])) {
                                        echo "<div style='color: red;'>"
                                            . $_SESSION['xato'] .
                                            "</div>";

                                        unset($_SESSION['xato']);
                                    } else if (isset($_SESSION['xato1'])) {
                                        echo "<div style='color: red;'>" . $_SESSION['xato1'] . "</div>";

                                        unset($_SESSION['xato1']);
                                    }
                                    else {
                                        echo "<div style='color: black'>Tasdiqlash kodoni kirirting</div>";
                                    }
                                    ?>
                                </p>
                                <form method="post" action="logins.php">
                                    <div style="position: absolute;  left: 15px; top: 12px">
                                        <a href="register.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="form-outline mb-1">
                                        <input type="text" name="user_kod" id="user-kod" placeholder="123456"
                                               class="form-control"/>
                                    </div>
                                    <div class="form-outline btn-block">
                                        <a class="nav-link" href="newUser.php?&ortga">Kodni qayta yuborish</a>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <button type="submit" name="kod" class="btn btn-success btn-block">
                                        Kodni yuborish
                                    </button>
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
