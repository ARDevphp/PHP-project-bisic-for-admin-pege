<?php
declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);
}

if (isset($_POST['avto_update'])) {
    $title = $_POST['title'];
    $name_id = $_POST['category_id'];
    updateAvtoCate($id, $title, $name_id);
    header("Location: avtocate.php");
}