<?php
//tag qo'shish
declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['user'])) {
    ?>
    <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
        <div class="row mt-3">
            <div class="col">
                <a href='texnika.php' class='btn btn-success'>Ortga</a>
            </div>
            <?php
            if (isset($_SESSION['non'])) {
                echo "<h3 style='color: red;'>" . $_SESSION['non'] . "</h3>";

                unset($_SESSION['non']);
            } else {
                echo " <h2 class='text-dark'>Yangi Texnika qo'shish</h2>";
            }
            if (isset($_SESSION['categoryM'])) {
                echo "<h3 style='color: red;'>" . $_SESSION['categoryM'] . "</h3>";

                unset($_SESSION['categoryM']);
            }
            ?>
            <form method="post" action="addTexnika.php">
                <div class="mb-3">
                    <label for="post_title_input" class="form-label">Madel nomi</label>
                    <input type="text" class="form-control px-8" name="name" id="post_title_input">
                </div>
                <div class="mb-3">
                    <label for="post_category_input" class="form-label">Madel turi:</label>
                    <select name="name_id" class="form-select" aria-label="Default select example">
                        <option selected>kategoriyasi</option>
                        <?php
                        foreach (getNewsList('texcate') as $item) {
                            echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Narxi</label>
                    <input class="form-control" id="exampleFormControlTextarea1" name="sum" rows="3">
                </div>
                <div class="mb-3">
                    <label for="text_name_input" class="form-label">Tavat malumoti</label>
                    <textarea class="form-control" name="info" id="text_name_input" rows="3"></textarea>
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
                <button type="submit" name="tex" class="btn btn-primary">Qo'shish</button>
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