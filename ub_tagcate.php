<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);
}

if (isset($_POST['texcate'])) {
    $category_id = $_POST['category_id'];
    $title = $_POST['name'];
    updateTagCate($id, $title, $category_id);
    header("Location: tag.php");
}