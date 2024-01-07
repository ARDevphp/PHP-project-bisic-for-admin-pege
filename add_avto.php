<?php
//avto qo'shish
declare(strict_types=1);


require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

$name = null;
$marka = null;
$sum = null;
$info = null;

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];

    unset($_SESSION['name']);
}
if (isset($_SESSION['marka'])) {
    $marka = $_SESSION['marka'];

    unset($_SESSION['marka']);
}

if (isset($_SESSION['sum'])) {
    $sum = $_SESSION['sum'];

    unset($_SESSION['sum']);
}
if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']);
}

if (isset($_SESSION['user'])) {
    ?>
    <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
        <div class="row mt-3">
            <div class="col">
                <a href='avto.php' class='btn btn-success'>Ortga</a>
            </div>
            <?php
            if (isset($_SESSION['pus'])) {
                echo "<h3 style='color: red;'>" . $_SESSION['pus'] . "</h3>";

                unset($_SESSION['pus']);
            } else {
                echo " <h2 class='text-dark'>Avto qo'shish</h2>";
            }
            ?>
            <form method="post" action="addAvto.php">
                <div class="mb-3">
                    <label for="post_title_input" class="form-label">Madel nomi</label>
                    <input type="text" class="form-control px-8" name="name" id="post_title_input" value="<?=$name?>">
                </div>
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Madel turi:</label>
                    <select name="name_id" class="form-select" aria-label="Default select example">
                        <option selected>kategoriyasi</option>
                        <?php
                        foreach (getNewsList('avtocate') as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Narxi</label>
                    <input class="form-control" id="exampleFormControlTextarea1" name="sum" rows="3" value="<?=$sum?>">
                </div>
                <div class="mb-3">
                    <label for="text_name_input" class="form-label">Tavat malumoti</label>
                    <textarea class="form-control" name="info" id="text_name_input" rows="3"><?=$info?></textarea>
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
                        <option selected>kategoriyasi</option>
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
                        <option selected>Kimga tegishli malumot</option>
                        <?php
                        foreach (userList() as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['firstname'] . " " . $item['lastname'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="avto" class="btn btn-primary">Qo'shish</button>
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
    <?php
} else {
    header('Location: login.php');
}