<?php

declare(strict_types=1);


session_start();
require_once 'datebaza/dataBazeSelect.php';

if (isset($_POST['tag'])) {
    if (!empty($_POST['name']) && !empty($_POST['category_id'])) {
        $title = $_POST['name'];
        $name_id = $_POST['category_id'];

        try {
            addCate('texcate', $title, $name_id);
            header("Location: tag.php");
            exit;
        } catch (Exception) {
            $_SESSION['category_id'] = "Kategoryani tanlag";
            header("Location: add_tag.php");
            exit();
        }
    } else {
        $_SESSION['cate'] = "Texnika modelga nom bermadingiz";
        header('Location: add_tag.php');
    }
}