<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/sort_asc_desc.php';
require_once 'datebaza/dataBazeSelect.php';

if (isset($_SESSION['user'])) { ?>
    <div class="col mt-3" style="position: absolute; left:20px">
        <a href='category.php' class='btn btn-primary'>Ortga</a>
    </div>
    <div class="container-fluid">
    <div class="row mt-5">
    <div class="col">
    <?php
    if (isset($_POST['search'])) {
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $title = $_POST['title'];

            $category = null;
            $news = null;
            $book = null;
            $avto = null;
            $tex = null;

            $category = searchTitle('category', $title);
            $news = searchTitle('news', $title);
            $book = searchTitle('book', $title);
            $avto = searchTitle('avto', $title);
            $tex = searchTitle('texnika', $title);
            if ($category) { ?>
                <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Kategoriya nomi</th>
                    <th scope="col"><a class="btn btn-primary" href="sort_category.php?sort"> Malumotlarni
                            saralash </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                search_category($title);
            } else if ($news) { ?>
                </tbody>
                </table>
                <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">content</th>
                    <th scope="col">author</th>
                    <th scope="col">visited_count</th>
                    <th scope="col">created_at</th>
                    <th scope="col"><a class="btn btn-primary" href="sort_news.php?sort"> Malumotlarni
                            saralash </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                search_news($title);
            } else if ($book) { ?>
                </tbody>
                </table>
                <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Kitob nomi</th>
                    <th scope="col">book_image</th>
                    <th scope="col">Content</th>
                    <th scope="col">author</th>
                    <th scope="col">Qo'shilgan vaqti</th>
                    <th scope="col"><a class="btn btn-primary" href="sort_category.php?sort"> Malumotlarni
                            saralash </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                search_book($title);
            } else if ($avto || $tex) {
                ?>
                </tbody>
                </table>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Nomi</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Narxi</th>
                        <th scope="col">Malumotlari</th>
                        <th scope="col">Kategorya</th>
                        <th scope="col">Kimga tegishli</th>
                        <th scope="col">image</th>
                        <th scope="col"><a class="btn btn-primary float-left" href="sort_avto.php?&sort"> Malumotlarni
                                saralash </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($avto) {
                        avtoTexSearch('avto', $title);
                    } else if ($tex) {
                        avtoTexSearch('texnika', $title);
                    }
                    ?>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
                <?php
            } else {
                echo "<h5 style='position: absolute; left: 550px; top: 200px;color: red;'>'$title' bunday malumot yo'q</h5>";
            }
        } else { ?>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Narxi</th>
                    <th scope="col">Malumotlari</th>
                    <th scope="col">Kategorya</th>
                    <th scope="col">Kimga tegishli</th>
                    <th scope="col">image</th>
                    <th scope="col"><a class="btn btn-primary float-left" href="sort_avto.php?&sort"> Malumotlarni
                            saralash </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                avto_SortTex('sort', 'avto');
                avto_SortTex('sort', 'texnika');
                ?>
                </tbody>
            </table>
            <?php
        }
    }
} else {
    header('Location: login.php');
}
