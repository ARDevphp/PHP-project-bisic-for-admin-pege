<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);
}

if (isset($_POST['cat_update'])) {
    $title = $_POST['title'];
    updateCategory($id, $title);
    header("Location: category.php");
}