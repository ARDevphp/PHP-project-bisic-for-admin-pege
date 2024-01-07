<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

$category_row = null;
$category = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $category_row = getAvtoCateById('texcate', $id);

    $news_row = getNewsById($id, 'texcate');

    //category nomi
    $cate_id = $news_row['name_id'];
    $category = getCategoryById($cate_id);
}
?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <a href='avtocate.php' class='ex btn'>Ortga</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mt-4">
        <form method="post" action="ub_tagcate.php">
            <div>
                <label for="category_name_input" class="form-label">Kategorya</label>
                <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected value="<?=$category['id']?>"><?= $category['name'] ?></option>
                    <?php
                    foreach (getNewsList('category') as $item) {
                        echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="category_name_input" class="form-label">Texnika model</label>
                <input type="text" class="form-control" name="name" id="category_name_input"
                       value="<?= $category_row['name'] ?>">
                <div class="form-text"></div>
            </div>
            <button type="submit" name="texcate" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
