<?php

declare(strict_types=1);

require_once 'datebaza/dataBazeSelect.php';
require_once 'datebaza/sort_asc_desc.php';
require_once 'header.php';

if (isset($_SESSION['user'])) {
    ?>
    <div class="container-fluid">
        <div class="col mt-2">
            <a href='category.php' class='ex btn'>Ortga</a>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Avto model</th>
                        <th scope="col">Kategoya</th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    avtoCate('avtocate');
                    ?>
                    </tbody>
                </table>
                <a href="add_avtocate.php?new" class="btn btn-success">Qo'shish</a>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="position:absolute; top: unset">
        <div class="row">
            <div class="col p-4 bg-dark text-light mt-4">
                &copy; All rights reserved
            </div>
        </div>
    </div>
    </div>
    <?php
} else {
    header('Location: login.php');
}