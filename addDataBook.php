<?php
declare(strict_types=1);

require_once 'datebaza/dataBazeSelect.php';
session_start();

if (isset($_POST['book'])) {

    $_SESSION['bookName'] = $_POST['bookName'];
    $_SESSION['text'] = $_POST['text'];
    $_SESSION['image'] = $_POST['image'];
    $_SESSION['category_id'] = $_POST['category_id'];
    $_SESSION['author_id'] = $_POST['author_id'];

    if (!empty($_POST['bookName'])
        && !empty($_POST['text'])
        && !empty($_POST['image'])
        && !empty($_POST['category_id'])
        && !empty($_POST['author_id'])) {
        $name = $_POST['bookName'];
        $text = $_POST['text'];
        $image = $_POST['image'];
        $content = $_POST['category_id'];
        $author = $_POST['author_id'];
        try {
            addbook($name, $text, $image, $content, $author);
            header("Location: book.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['category'] = "Kategory va Muallifni kiriting";
            header('Location: add_book.php');
        }
    } else {
        $_SESSION['no'] = "Maydonlarni to'ldiring";
        $_SESSION['bookName'] = $_POST['bookName'];
        header('Location: add_book.php');
    }
}