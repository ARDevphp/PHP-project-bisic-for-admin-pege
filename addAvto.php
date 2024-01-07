<?php

declare(strict_types=1);

require_once 'datebaza/dataBazeSelect.php';
session_start();

if (isset($_POST['avto'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['marka'] = $_POST['marka'];
    $_SESSION['sum'] = $_POST['sum'];
    $_SESSION['info'] = $_POST['info'];

    if (!empty($_POST['name']) && !empty($_POST['name_id'])
        && !empty($_POST['sum']) && !empty($_POST['info'])
        && !empty($_POST['image'])) {

        $name = $_POST['name'];
        $marka = $_POST['name_id'];
        $sum = $_POST['sum'];
        $info = $_POST['info'];
        $image = $_POST['image'];
        $categoryId = $_POST['category_id'];
        $authorId = $_POST['author_id'];


        $sum1 = substr($sum, -4);
        if ($sum1 !== "so'm") {
            $sum .= " so'm";
        }

        try {
            addAvto($name, $marka, $sum, $info, $categoryId, $authorId, $image);
            header('Location: avto.php');
            exit();
        } catch (Exception $e) {
            header('Location: add_avto.php');
        }
    } else {
        $_SESSION['pus'] = "Maydonlarni to'ldiring";
        header('Location: add_avto.php');
    }
}