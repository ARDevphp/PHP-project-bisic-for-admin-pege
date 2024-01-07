<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    if (isset($_POST['tex'])) {
        $nameTex = $_POST['name'];
        $markaTex = $_POST['mak'];
        $sum = $_POST['sum'];
        $info = $_POST['info'];
        $category_id = $_POST['category_id'];
        $author_id = $_POST['author_id'];

        if (!empty($_POST['image'])){
            $image = $_POST['image'];
        } else {
            $image = $_SESSION['image'];

            unset($_SESSION['image']);
        }

        $sum1 = substr($sum, -4);
        if ($sum1 !== "so'm") {
            $sum .= " so'm";
        }

        updateTexo($id, $nameTex, $markaTex, $sum, $info, $category_id, $author_id, $image);
        header("Location: texnika.php");
        exit();
    }
}