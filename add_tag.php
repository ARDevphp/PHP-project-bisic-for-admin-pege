<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['user'])) {
    ?>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <a href='tag.php' class='ex btn'>Ortga</a>
            </div>
            <?php
            if (isset($_SESSION['cate'])) {
                echo "<h2 style='color: red'>" . $_SESSION['cate'] . "</h2>";
                unset($_SESSION['cate']);
            } else if (isset($_SESSION['category_id'])) {
                echo "<h2 style='color: red'>" . $_SESSION['category_id'] . "</h2>";
                unset($_SESSION['category_id']);
            } else {
                echo "<h2 class='text-dark'>Texnika kategriyasini qo'shish</h2>";
            }
            ?>
            <form method="post" action="addTag.php">
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Kategorya:</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>kategoriyasi</option>
                        <?php
                        foreach (getNewsList('category') as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Texnika model</label>
                    <input type="text" class="form-control" name="name" id="category_name_input">
                </div>
                <button type="submit" name="tag" class="btn btn-primary">Qo'shish</button>
            </form>
        </div>
    </div>
    <?php
} else {
    header('Location: login.php');
}