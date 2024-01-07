<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';


$category_row = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $category_row = getCategoryById($id);
}
if (isset($_SESSION['user'])) {
?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <a href='category.php' class='btn btn-success'>Ortga</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-4">
        <form method="post" action="ub_category.php">
            <div class="mb-3">
                <label for="category_name_input" class="form-label">Kategriya o'zgartirish</label>
                <input type="text" class="form-control" name="title" id="category_name_input" value="<?=$category_row['name']?>">
                <div class="form-text"></div>
            </div>
            <button type="submit" name="cat_update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php } else {
    header('Location: login.php');
}