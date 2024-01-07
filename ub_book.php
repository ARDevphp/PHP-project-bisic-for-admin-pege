<?php

declare(strict_types=1);

session_start();

require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    unset($_SESSION['id']);

    if (isset($_POST['book_update'])) {
        $name = $_POST['name'];
        $text = $_POST['text'];
        $categoryId = $_POST['category_id'];
        $authorId = $_POST['author_id'];

        if (!empty($_POST['image'])){
            $image = $_POST['image'];
        } else {
            $image = $_SESSION['image'];
            unset($_SESSION['image']);
        }

        updateBook($id, $name, $text, $categoryId, $authorId, $image);
        header("Location: book.php");
        exit();
    }
}