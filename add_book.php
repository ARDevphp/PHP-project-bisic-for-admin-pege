<?php


//book qo'shish

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

$book = null;
$text = null;

if (isset($_SESSION['bookName'])) {
    $book = $_SESSION['bookName'];

    unset($_SESSION['bookName']);
}
if (isset($_SESSION['text'])){
    $text = $_SESSION['text'];

    unset($_SESSION['text']);
}


if (isset($_SESSION['user'])) {
    ?>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <a href='book.php' class='btn btn-success'>Ortga</a>
            </div>
            <div>
                <?php
                if (isset($_SESSION['no'])) {
                    echo "<h3 style='color: red;'>" . $_SESSION['no'] . "</h3>";

                    unset($_SESSION['no']);
                } else {
                    echo "<h2 class='text-dark'>Yangi kitob qo'shish</h2>";
                }
                if (isset($_SESSION['category'])) {
                    echo "<h3 style='color: red;'>" . $_SESSION['category'] . "</h3>";

                    unset($_SESSION['category']);
                }
                ?>
            </div>
            <form method="post" action="addDataBook.php">
                <div class="mb-3">
                    <label for="book_name_input" class="form-label">Kitob nomi</label>
                    <input type="text" class="form-control" name="bookName" id="book_name_input" value="<?= $book ?>">
                </div>
                <div class="mb-3">
                    <label for="text_name_input" class="form-label">Kitob matni</label>
                    <textarea class="form-control" name="text" id="text_name_input" rows="3"><?=$text?></textarea>
                </div>
                <div>
                    <div class="mb-3">
                        <img src="img/book.gif"
                             alt="example placeholder" style="width: 110px;"/>
                        <div class="col mt-2">
                            <div class="btn btn-success btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Kitob rasmi</label>
                                <input type="file" class="form-control d-none" id="customFile1" name="image"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Kategorya:</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected >kategoriyasi</option>
                        <?php
                        foreach (getNewsList('category') as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="post_author_input" class="form-label">Muallif:</label>
                    <select name="author_id" class="form-select" aria-label="Default select example">
                        <option selected >Kimga tegishli malumot</option>
                        <?php
                        foreach (userList() as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['firstname'] . " " . $item['lastname'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="book" class="btn btn-primary">Qo'shish</button>
            </form>
        </div>
    </div>
    <div class="container-fluid" style="position: absolute; bottom: unset">
        <div class="row">
            <div class="col p-4 bg-dark text-light mt-4">
                &copy; All rights reserved
            </div>
        </div>
    </div>
    <?php
} else {
    header('Location: login.php');
}
