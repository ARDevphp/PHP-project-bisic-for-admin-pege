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
                <a href='avto.php' class='btn btn-success'>Ortga</a>
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
                                <a href="sort_avto.php?&id_asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                     style="max-width: 15px;"></a>

                                <a href="sort_avto.php?&id_desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                      style="max-width: 15px;"></a>
                            </div>
                            #id
                        </th>
                        <th scope="col">
                            <div>
                                <a href="sort_avto.php?&asc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                  style="max-width: 15px;"></a>

                                <a href="sort_avto.php?&desc"><img src="img/desc.png" alt="DESC" class="img-fluid"
                                                                   style="max-width: 15px;"></a>
                            </div>
                            Nomi
                        </th>
                        <th scope="col">Marka</th>
                        <th scope="col">
                            <div>
                                <a href="sort_avto.php?&sumasc"><img src="img/asc.png" alt="ASC" class="img-fluid"
                                                                     style="max-width: 15px;"></a>

                                <a href="sort_avto.php?&sumdesc"><img src="img/desc.png" alt="DESC" class="img-fluid"
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
                        avto_SortTex('sort', 'avto');
                    }

                    if (isset($_GET['asc'])) {
                        avto_SortTex('asc', 'avto');
                    } else if (isset($_GET['desc'])) {
                        avto_SortTex('desc', 'avto');
                    } else if (isset($_GET['id_asc'])) {
                        avto_SortTex('id_asc' ,'avto');
                    } else if (isset($_GET['id_desc'])) {
                        avto_SortTex('id_desc', 'avto');
                    } else if (isset($_GET['sumasc'])) {
                        avto_SortTex('sumasc', 'avto');
                    } else if (isset($_GET['sumdesc'])) {
                        avto_SortTex('sumdesc', 'avto');
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