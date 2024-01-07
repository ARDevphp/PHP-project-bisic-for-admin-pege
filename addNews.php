<?php
declare(strict_types=1);

session_start();

require_once "datebaza/dataBazeSelect.php";

if (isset($_POST['post_add'])) {
    $_SESSION['content'] = $_POST['content'];

    if (!empty($_POST['title'])
        && !empty($_POST['content'])
        && !empty($_POST['image'])) {
        $title = $_POST['title'];
        $authorId = $_POST['author_id'];
        $categoryId = $_POST['category_id'];
        $image = $_POST['image'];
        $content = $_POST['content'];
        try {
            addNews($title, $authorId, $categoryId, $image, $content);
            header("Location: news.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['categoryM'] = "Kategory va Muallifni kiriting";
            header('Location: add_news.php');
        }
    } else {
        $_SESSION['non'] = "Maydonlarni to'ldiring";
        $_SESSION['title'] = $_POST['title'];
        header('Location: add_news.php');
    }
}
