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
                <a href='texnika.php' class='btn btn-success'>Ortga</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div>
                                <a href="sort_texnika.php?&id_asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                        style="max-width: 13px;"></a>

                                <a href="sort_texnika.php?&id_desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                         style="max-width: 13px;"></a>
                            </div>
                            #id
                        </th>
                        <th scope="col">
                            <div>
                                <a href="sort_texnika.php?&asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                     style="max-width: 15px;"></a>

                                <a href="sort_texnika.php?&desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                      style="max-width: 15px;"></a>
                            </div>
                            Nomi
                        </th>
                        <th scope="col">Marka</th>
                        <th scope="col">
                            <div>
                                <a href="sort_texnika.php?&sumasc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                        style="max-width: 15px;"></a>

                                <a href="sort_texnika.php?&sumdesc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                         style="max-width: 15px;"></a>
                            </div>
                            Summa
                        </th>
                        <th scope="col">Malumotlar</th>
                        <th scope="col">Kategoryasi</th>
                        <th scope="col">Author</th>
                        <th scope="col">image</th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['sort'])) {
                        avto_SortTex('sort', 'texnika');
                    }

                    if (isset($_GET['asc'])) {
                        avto_SortTex('asc', 'texnika');
                    } else if (isset($_GET['desc'])) {
                        avto_SortTex('desc', 'texnika');
                    } else if (isset($_GET['id_asc'])) {
                        avto_SortTex('id_asc', 'texnika');
                    } else if (isset($_GET['id_desc'])) {
                        avto_SortTex('id_desc', 'texnika');
                    } else if (isset($_GET['sumasc'])) {
                        avto_SortTex('sumasc', 'texnika');
                    } else if (isset($_GET['sumdesc'])) {
                        avto_SortTex('sumdesc', 'texnika');
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