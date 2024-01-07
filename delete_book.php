<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        deleteColumn($id, 'book');
        header("Location: book.php");
        exit();
    }
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'no') {
        header('Location: book.php');
        exit();
    }
}
if (isset($_SESSION['user'])) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Yangiliklar.uz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container-fluid">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-7">
                    <div class="row justify-content-center">
                        <p>
                        <div class="d-inline p-2 bg-light text-danger">Malumotni rostan ham o'rmoqchimisiz!</div>
                        </p>
                        <a href='delete_book.php?id=<?= $id ?>&confirm=yes' class='btn btn-danger'>Ha</a>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <a href='delete_book.php?id=<?= $id ?>&confirm=no' class='btn btn-primary'>Yo'q</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header('Location: login.php');
}