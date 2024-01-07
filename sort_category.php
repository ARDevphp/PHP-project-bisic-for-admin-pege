<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/dataBazeSelect.php';
require_once 'datebaza/sort_asc_desc.php';

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
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id
                            <div>
                                <a href="sort_category.php?&id_asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                         style="max-width: 15px;"></a>
                                <a href="sort_category.php?&id_desc"><img src="img/desc.png" alt="DESC"
                                                                          class="img-fluid"
                                                                          style="max-width: 15px;"></a>
                            </div>
                        </th>
                        <th scope="col">Kategoriya nomi</th>
                        <th scope="col">
                            <div>
                                <a href="sort_category.php?&asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                      style="max-width: 20px;"></a>
                                <a href="sort_category.php?&desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                       style="max-width: 20px;"></a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['sort'])) {
                        sortCategory('sort');
                    }

                    if (isset($_GET['asc'])) {
                        sortCategory('asc');
                    } else if (isset($_GET['desc'])) {
                        sortCategory('desc');
                    } else if (isset($_GET['id_asc'])) {
                        sortCategory('sort');
                    } else if (isset($_GET['id_desc'])) {
                        sortCategory('id_desc');
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

