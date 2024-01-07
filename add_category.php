<?php

//categorya qo'shish

declare(strict_types=1);
require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['user'])) {
    ?>

    <div class="container-fluid">
    <div class="row mt-3">
    <div class="col">
        <a href='category.php' class='btn btn-success'>Ortga</a>
    </div>
    <?php
    if (isset($_SESSION['cate'])) {
        echo "<h2 style='color: red'>" . $_SESSION['cate'] . "</h2>";
        unset($_SESSION['cate']);
    } else {
        echo "<h2 class='text-dark'>Yangi kategriya qo'shish</h2>";
    }
?>
    <form method="post" action="addCategory.php">
        <div class="mb-3">
            <label for="category_name_input" class="form-label">Kategriya qo'shish</label>
            <input type="text" class="form-control" name="title" id="category_name_input">
        </div>
        <button type="submit" name="cate" class="btn btn-primary">Qo'shish</button>
    </form>
    </div>
    </div>
<?php
} else {
    header('Location: login.php');
}
