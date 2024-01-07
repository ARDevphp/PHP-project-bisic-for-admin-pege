<?php

declare(strict_types=1);

require_once 'datebaza/dataBazeSelect.php';
session_start();

if (isset($_POST['tex'])) {
    if (!empty($_POST['name']) && !empty($_POST['name_id'])
        && !empty($_POST['sum']) && !empty($_POST['info'])
        && !empty($_POST['image']) && !empty($_POST['category_id'])
        && !empty($_POST['author_id'])) {

        $name = $_POST['name'];
        $marka_id = $_POST['name_id'];
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
            addTexnik($name, $marka_id, $sum, $info, $categoryId, $authorId, $image);
            header('Location: texnika.php');
            exit();
        } catch (Exception $e) {
            header('Location: add_texnika.php');
        }
    } else {
        $_SESSION['pus'] = "Maydonlarni to'ldiring";
        header('Location: add_texnika.php');
    }
}