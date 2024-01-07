<?php
declare(strict_types=1);

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/qq-com-icon-logo-9062C4722F-seeklogo.com.png" type="image/x-icon">
    <title>Yangiliklar.uz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Asosiy sahifa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  " href="avto.php">Avto olam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php">Yangiliklar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="book.php">Kitoblar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Kategoriyalar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="texnika.php">Texnika</a>
                </li>
                <div style="position: absolute; right: 80px">
                    <form class="d-flex" role="search" method="post" action="search.php">
                        <input class="form-control me-2" type="search" name="title" placeholder="Qidiruv">
                        <button class="btn btn-success" type="submit" name="search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <div class="user">
                        <button class="btn btn-secondary dropdown" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                        </button>
                        <ul class="drop dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">Aloqa bo'limi</a></li>
                            <li><a class="dropdown-item" href="#">Xabarlar</a></li>
                            <li><a class="dropdown-item" href="#">Profilni sozlash</a></li>
                            <li><a class="dropdown-item" href="#">Sozlamalar</a></li>
                            <li><a class="sain dropdown-item" href="userUnset.php?chiqish">Chiqish</a></li>
                        </ul>
                    </div>
                <?php } else {?>
                <div style="position: absolute; right: 10px; color: black">
                    <h5><a class="nav-link" href="login.php?kirish">Kirish</a></h5>
                </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
