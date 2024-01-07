<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';


$news_row = null;
$category = null;
$userAuthor = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;

    $news_row = getNewsById($id, 'news');
    $_SESSION['image'] = $news_row['image'];

    //category nomi
    $cate_id = $news_row['category_id'];
    $category = getCategoryById($cate_id);

    //mualif ism sharifi
    $author_id = $news_row['author_id'];
    $userAuthor = author_user($author_id);
}
if (isset($_SESSION['user'])) {
    ?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <a href='news.php' class='btn btn-success'>Ortga</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-4">
            <form method="post" action="ub_news.php">
                <div class="mb-3">
                    <label for="post_title_input" class="form-label">Yangilik nomi:</label>
                    <input type="text" class="form-control px-8" name="title" value="<?= $news_row['name'] ?>"
                           id="post_title_input">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Kontent:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"><?=$news_row['name']?></textarea>
                </div>
                <div>
                    <div class="mb-3">
                        <img src="img/book.gif"
                             alt="example placeholder" style="width: 110px;"/>
                        <div class="col mt-2">
                            <div class="btn btn-success btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Rasmi</label>
                                <input type="file" class="form-control d-none" id="customFile1" name="image"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Kategorya:</label>
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
                    <label for="post_author_input" class="form-label">Muallif:</label>
                    <select name="author_id" class="form-select" aria-label="Default select example">
                        <option selected value="<?=$userAuthor['id']?>"><?=$userAuthor['firstname'] . " " . $userAuthor['lastname']?></option>
                        <?php
                        foreach (userList() as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['firstname'] . " " . $item['lastname'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="new_update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="container-fluid" style="position:absolute; top: unset">
        <div class="row">
            <div class="col p-4 bg-dark text-light mt-4">
                &copy; All rights reserved
            </div>
        </div>
    </div>
<?php } else {
    header('Location: login.php');
}