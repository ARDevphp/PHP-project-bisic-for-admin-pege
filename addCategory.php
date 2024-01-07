<?php

declare(strict_types=1);

session_start();
require_once 'datebaza/dataBazeSelect.php';

if (isset($_POST['cate'])) {
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        addCategory('category', $title);
        header("Location: category.php");
        exit;
    } else {
        $_SESSION['cate'] = "Kategoryaga nom bermadingiz";
        header('Location: add_category.php');
    }
}