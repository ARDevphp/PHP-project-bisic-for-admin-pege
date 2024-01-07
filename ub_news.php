<?php
declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    if (isset($_POST['new_update'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category_id'];
        $authorId = $_POST['author_id'];

        if (isset($_POST['image']) && !empty($_POST['image'])){
            $image = $_POST['image'];
        } else {
            $image = $_SESSION['image'];
            unset($_SESSION['image']);
        }

        updateNews($id, $title, $content, $categoryId, $authorId, $image);
        header("Location: news.php");
    }
}
