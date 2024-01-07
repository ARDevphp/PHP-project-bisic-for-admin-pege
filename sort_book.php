<?php
declare(strict_types=1);

require_once "header.php";
require_once "datebaza/dataBazeSelect.php";
require_once 'datebaza/sort_asc_desc.php';

if (isset($_SESSION['user'])) {
    ?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <a href='book.php' class='btn btn-success'>Ortga</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id
                            <div style="position: absolute; top: 115px; left: 10px">
                                <a href="sort_book.php?&id_asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                     style="max-width: 14px;"></a>
                                <a href="sort_book.php?&id_desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                      style="max-width: 14px;"></a>
                            </div>
                        </th>
                        <th scope="col">Kitob nomi</th>
                        <th scope="col">book_image</th>
                        <th scope="col">Kategoryasi</th>
                        <th scope="col">author</th>
                        <th scope="col">visited_count</th>
                        <th scope="col">Qo'shilgan vaqti</th>
                        <div style="position: absolute; top: 115px; left: 80px">
                            <a href="sort_book.php?&asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                              style="max-width: 15px;"></a>

                            <a href="sort_book.php?&desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                               style="max-width: 15px;"></a>
                        </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['sort'])) {
                        book_Sort('sort');
                    }

                    if (isset($_GET['asc'])) {
                        book_Sort('asc');
                    } else if (isset($_GET['desc'])) {
                        book_Sort('desc');
                    } else if (isset($_GET['id_asc'])) {
                        book_Sort('sort');
                    } else if (isset($_GET['id_desc'])) {
                        book_Sort('id_desc');
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php
} else {
    header('Location: login.php');
}