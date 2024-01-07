<?php

declare(strict_types=1);

require_once 'header.php';
require_once 'datebaza/sort_asc_desc.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
?>
<link href="style.css" rel="stylesheet">
<div class="container-fluid">
    <!-- main qatori boshlandi -->
    <div class="row mt-3">
        <div class="col-12 col-md-2">
            <ul class="list-group">
                <li> <?= category_user() ?></li>
            </ul>
        </div>
        <div class="col mt-3">
            <div class="col-12 col-md-10">
                <!-- kitonlar qatori boshlandi-->
                <div class="row mt-4 mt-md-0">
                    <!-- kitob boshlandi -->
                    <?php
                    book($page);
                    ?>
                </div>
                <!-- kitonlar tugadi-->

                <!-- pagin qatori boshlandi -->
                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= getPegination("book"); $i++) { ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="book.php?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main qatori boshlandi -->

