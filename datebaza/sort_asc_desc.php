<?php

declare(strict_types=1);

require_once 'dataBazeSelect.php';

//--categorya funksiyalari
function category1($page): void
{
    foreach (getCategoryList($page) as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td><a href='update_category.php?&id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?&id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function search_category($name): void
{
    foreach (searchTitle('category', $name) as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td><a href='update_category.php?&id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?&id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function search_news($name): void
{
    foreach (searchTitle('news', $name) as $item) {
        $categoryId = getCategoryById($item['category_id']);
        $userAuthor = author_user($item['author_id']);
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['content'] . "</td>";
        echo "<td>" . $categoryId['name'] . "</td>";
        echo "<td>" . $userAuthor['firstname'] . "</td>";
        echo "<td>" . $item['visited_count'] . "</td>";
        echo "<td>" . $item['created_at'] . "</td>";
        echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function search_book($name): void
{
    foreach (searchTitle('book', $name) as $item) {
        $categoryId = getCategoryById($item['category_id']);
        $userAuthor = author_user($item['author_id']);
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['image'] . "</td>";
        echo "<td>" . $categoryId['name'] . "</td>";
        echo "<td>" . $userAuthor['firstname'] . "</td>";
        echo "<td>" . $item['created_at'] . "</td>";
        echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function avtoTexSearch(string $dbName, string $name): void
{
    foreach (searchTitle($dbName, $name) as $item) {

        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['marka'] . "</td>";
        echo "<td>" . $item['sum'] . "</td>";
        echo "<td>" . $item['info'] . "</td>";
        if ($categoryId = getCategoryById($item['category_id'])) {
            echo "<td>" . $categoryId['name'] . "</td>";
        }
        if ($userAuthor = author_user($item['author_id'])) {
            echo "<td>" . $userAuthor['firstname'] . "</td>";
        }
        echo "<td>" . $item['image'] . "</td>";
        echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function sortCategory(string $name): void
{
    if ($name === 'sort') {
        foreach (Asc('category', 'id') as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td><a href='update_category.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'asc') {
        foreach (Asc('category', 'name') as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td><a href='update_category.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'desc') {
        foreach (Desc('category', 'name') as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td><a href='update_category.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'id_desc') {
        foreach (Desc('category', 'id') as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td><a href='update_category.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_category.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
}

//categoryya funksiyalar tugadi

//--- news funcsiyalari

function news_list($page): void
{
    foreach (getNewsList1($page) as $item) {
        $categoryId = getCategoryById($item['category_id']);
        $userAuthor = author_user($item['author_id']);
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['content'] . "</td>";
        echo "<td>" . $categoryId['name'] . "</td>";
        echo "<td>" . $userAuthor['firstname'] . "</td>";
        echo "<td>" . $item['image'] . "</td>";
        echo "<td>" . $item['created_at'] . "</td>";
        echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function sortNews(string $name): void
{
    if ($name === 'sort') {
        foreach (Asc('news', 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['content'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'asc') {
        foreach (Asc('news', 'title') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['content'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'desc') {
        foreach (Desc('news', 'title') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['content'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'id_desc') {
        foreach (Desc('news', 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name   '] . "</td>";
            echo "<td>" . $item['content'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td><a href='update_news.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_news.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
}

//--news function_lar tugadi


//user qo'shishda ortiqcha belgilarni o'chirish trim
function clearText($text): string
{
    return strip_tags(trim($text));
}


//book uchun functionlar admin
function books($page): void
{
    foreach (dataWrite($page, 'book') as $item) {
        $categoryId = getCategoryById($item['category_id']);
        $userAuthor = author_user($item['author_id']);
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['image'] . "</td>";
        echo "<td>" . $categoryId['name'] . "</td>";
        echo "<td>" . $userAuthor['firstname'] . " " . $userAuthor['lastname'] . "</td>";
        echo "<td>" . $item['created_at'] . "</td>";
        echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

function book_Sort(string $name): void
{
    if ($name === 'sort') {
        foreach (Asc('book', 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'asc') {
        foreach (Asc('book', 'name') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'desc') {
        foreach (Desc('book', 'name') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    if ($name === 'id_desc') {
        foreach (Desc('book', 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['visited_count'] . "</td>";
            echo "<td>" . $item['created_at'] . "</td>";
            echo "<td><a href='update_book.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_book.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
}

//admin book tugadi

//admin avto
function avto_SortTex(string $name, string $dbName): void //malumotlarni sortlash uchun admin avto
{
    if ($name === 'sort') {
        foreach (sortAvtoTex($dbName) as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka_id'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'asc') {
        foreach (Asc($dbName, 'name') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'desc') {
        foreach (Desc($dbName, 'name') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'id_asc') {
        foreach (Asc($dbName, 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'id_desc') {
        foreach (Desc($dbName, 'id') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'sumasc') {
        foreach (Asc($dbName, 'sum') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
    if ($name === 'sumdesc') {
        foreach (Desc($dbName, 'sum') as $item) {
            $categoryId = getCategoryById($item['category_id']);
            $userAuthor = author_user($item['author_id']);
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "<td>" . $item['marka'] . "</td>";
            echo "<td>" . $item['sum'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td>" . $categoryId['name'] . "</td>";
            echo "<td>" . $userAuthor['firstname'] . "</td>";
            echo "<td>" . $item['image'] . "</td>";
            if ($dbName === 'avto') {
                echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            if ($dbName === 'texnika') {
                echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
    }
}//admin avto sort
function avto_list($page): void
{
    foreach (dataWrite($page, 'avto') as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        if ($marka = getAvtoCateTag('avtocate', $item['marka_id'])) {
            echo "<td>" . $marka['name'] . "</td>";
        }
        echo "<td>" . $item['sum'] . "</td>";
        echo "<td>" . $item['info'] . "</td>";
        if ($categoryId = getCategoryById($item['category_id'])) {
            echo "<td>" . $categoryId['name'] . "</td>";
        }
        if ($userAuthor = author_user($item['author_id'])) {
            echo "<td>" . $userAuthor['firstname'] . "</td>";
        }
        echo "<td>" . $item['image'] . "</td>";
        echo "<td><a href='update_avto.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avto.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

//admin avto tugadi

//texnika function_lar
function texnik_list($page): void
{
    foreach (dataWrite($page, 'texnika') as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        if ($marka_id = getAvtoCateTag('texcate', $item['marka_id'])) {
            echo "<td>" . $marka_id['name'] . "</td>";
        }
        echo "<td>" . $item['sum'] . "</td>";
        echo "<td>" . $item['info'] . "</td>";
        if ($categoryId = getCategoryById($item['category_id'])) {
            echo "<td>" . $categoryId['name'] . "</td>";
        }
        if ($userAuthor = author_user($item['author_id'])) {
            echo "<td>" . $userAuthor['firstname'] . "</td>";
        }
        echo "<td>" . $item['image'] . "</td>";
        echo "<td><a href='update_texnika.php?id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_texnika.php?id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
}

// texnika function_lar tugadi

//random sonlar userga sms uchu
function rand_number(): int
{
    return rand(100000, 999999);
}

//avtoCate boshlandi
function avtoCate($name): void
{
    foreach (sortAvtoTex($name) as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        if ($name === 'avtocate') {
            if ($categoryId = getCategoryById($item['name_id'])) {
                echo "<td>" . $categoryId['name'] . "</td>";
            }
            echo "<td><a href='update_avtocate.php?&id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_avtocate.php?&id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
        if ($name === 'texcate') {
            if ($categoryId = getCategoryById($item['name_id'])) {
                echo "<td>" . $categoryId['name'] . "</td>";
            }
            echo "<td><a href='update_tagcate.php?&id=" . $item['id'] . "' class='btn btn-primary'>Update</a>
                      <a href='delete_tagcate.php?&id=" . $item['id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
}

//avtoCate tugadi

//user_functions boshlandi

function category_user()
{
    foreach (userCategoryRead() as $item) {
        echo '<tr>';
        echo '<td><a href="index.php" class="list-group-item">' . $item['name'] . '</a></td>';
        echo '</tr>';
    }
}

function category_book()
{
    $category_id = [];
    foreach (bookCategory() as $item => $value) {
        $category_id[$item] = $value['category_id'];
    }
    foreach (getNewslist('category') as $item) {
        for ($i = 0; $i < count($category_id); $i++) {
            if ($item['id'] == $category_id[$i]) {
                $oneCategory = false;
                for ($j = $i + 1; $j < count($category_id); $j++) {
                    if ($category_id[$i] == $category_id[$j]) {
                        $oneCategory = true;
                    }
                }
                if (!$oneCategory) {
                    echo '<tr>';
                    echo '<td><a href="sort_asc_desc.php" class="list-group-item" aria-current="true">' . $item['name'] . '</a></td>';
                    echo '</tr>';
                }
            }
        }
    }
}

function book($paga)
{
    foreach (bookWrite($paga) as $item) {
        $image = $item['image'];
        ?>
        <div class="col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card">
                <img src="<?= $image ?>." class="img-fluid" alt="Responsive image">

                <?php
                echo '<div class="card-body">';
                //header("Content-type: image/jpg");
                echo '<h5 class="card-title">' . $item['name'] . '</h5>';
                //echo '<p class="card-text">' . $item['text'] . '</p>';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                     viewBox="0 0 16 16">
                    <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
                <?php
                echo '<p class="card-text">' . $item['visited_count'] . '</p>';
                echo '<p class="card-text">' . "Qo'shilgan vaqti " . $item['created_at'] . '</p>';
                echo '<a href="index.html" class="btn btn-primary">' . "O'qish" . '</a>';
                echo '</div>';
                ?>
            </div>
        </div>
        <?php
    }
}
