<?php

declare(strict_types=1);

session_start();
require_once 'datebaza/dataBazeSelect.php';

if (isset($_POST['avtoCate'])) {
    if (!empty($_POST['title']) && !empty($_POST['category_id'])) {
        $title = $_POST['title'];
        $name_id = $_POST['category_id'];

        try {
            addCate('avtocate', $title, $name_id);
            header("Location: avtocate.php");
            exit;
        } catch (Exception) {
            $_SESSION['category_id'] = "Kategoryani tanlag";
            header("Location: add_avtocate.php");
            exit();
        }
    } else {
        $_SESSION['cate'] = "Avto Kategoryasiga nom bermadingiz";
        header('Location: add_avtocate.php');
    }
}