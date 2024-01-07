<?php

declare(strict_types=1);

require_once 'datebaza/dataBazeSelect.php';
require_once 'datebaza/sort_asc_desc.php';
require_once 'header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Yangilik nomi</th>
                    <th scope="col">content</th>
                    <th scope="col">Kategorya</th>
                    <th scope="col">author</th>
                    <th scope="col">image</th>
                    <th scope="col">created_at</th>
                    <th scope="col"><a class="btn btn-primary" href="sort_news.php?sort"> Malumotlarni saralash </a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                news_list($page);
                ?>
                </tbody>
            </table>
            <a href="add_news.php?new" class="btn btn-success">Qo'shish</a>
            <div class="row mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= getPegination("news"); $i++) { ?>
                            <li class="page-item"><a class="page-link" href="news.php?page=<?= $i ?>"><?= $i ?></a>
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
<div class="container-fluid" style="position: absolute; bottom: unset">
    <div class="row">
        <div class="col p-4 bg-dark text-light mt-4">
            &copy; All rights reserved
        </div>
    </div>
</div>
</div>
