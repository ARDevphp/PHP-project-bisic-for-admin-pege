<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    if (isset($_POST['avto_update'])) {
        $name = $_POST['name'];
        $marka_id = $_POST['marka_id'];
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

        updateAvto($id, $name, $marka_id, $sum, $info, $category_id, $author_id, $image);
        header("Location: avto.php");
        exit();
    }
}