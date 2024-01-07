<?php

declare(strict_types=1);

//categoryaga tegishli funcsiyalar
function getCategoryList($page)
{
    $limit = 5;
    include "data_baze.php";

    $offset = ($page - 1) * $limit;
    $sql = "select * from news.category limit :offset, :limit";
    $state = $dns->prepare($sql);
    $state->bindValue(':limit', $limit, PDO::PARAM_INT);
    $state->bindValue(':offset', $offset, PDO::PARAM_INT);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function addCategory(string $title, string $name)
{
    include "data_baze.php";

    $sql_insert = "insert into news." . $title . " (name) values (:name)";
    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $name);
    $state->execute();
}
function addCate(string $title, string $name, $name_id)
{
    include "data_baze.php";

    $sql_insert = "insert into news." . $title . " (name, name_id) values (:name, :name_id)";
    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $name);
    $state->bindValue(':name_id', $name_id);
    $state->execute();
}

function getPegination($tableName)
{

    $limit = 5;
    include "data_baze.php";

    $sql_select = "select * from " . $tableName;
    $state = $dns->prepare($sql_select);
    $state->execute();
    $totalRows = $state->rowCount();

    return ceil($totalRows / $limit);
}

function getCategoryById($id): mixed
{
    include "data_baze.php";

    $sql_select = "select * from news.category where id = :id";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->execute();

    return $state->fetch(PDO::FETCH_ASSOC);
}

function getAvtoCateTag(string $name, $id): mixed
{
    include "data_baze.php";

    $sql_select = "select * from news." . $name ." where id = :id";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->execute();

    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateCategory($id, $name)
{
    include "data_baze.php";

    $sql_update = "update news.category set name = :title where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->bindValue(':title', $name);
    $state->execute();
}

function deleteColumn($id, string $name)
{
    include "data_baze.php";

    $sql_delete = "delete from news." . $name . " where id = :id";
    $state = $dns->prepare($sql_delete);
    $state->bindValue(':id', $id, PDO::PARAM_INT);

    try {
        $state->execute();
    } catch (Exception) {
        header('Location: noDeleteCategory.php');
        exit();
    }
}

function searchTitle(string $dbName, string $name)
{
    include "data_baze.php";

    $sql_select = "select * from news." . $dbName . " where name = :name";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':name', $name);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

//category qismiga tegishli funksiyalar tugadi

//---- newsga tegishli funcsiyalar
function getNewsList(string $name)
{
    include "data_baze.php";
    $sql = "select * from news." . $name;
    $state = $dns->prepare($sql);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function getNewsList1($page)
{
    include "data_baze.php";

    $limit = 5;
    $offset = ($page - 1) * $limit;

    $sql_select = ("select * from news.news limit :offset, :limit");
    $state = $dns->prepare($sql_select);
    $state->bindValue(':limit', $limit, PDO::PARAM_INT);
    $state->bindValue(':offset', $offset, PDO::PARAM_INT);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function addNews($name, $authorId, $categoryId, $image, $content)
{
    include "data_baze.php";

    $sql_insert = "insert into news.news (name, content, category_id, author_id, image, visited_count, created_at) 
    values (:name, :content, :category_id, :author_id, :image, :visited_count, :created_at)";
    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $name);
    $state->bindValue(':content', $content);
    $state->bindValue(':category_id', $categoryId);
    $state->bindValue(':author_id', $authorId);
    $state->bindValue(':image', $image);
    $state->bindValue(':visited_count', 0);
    $state->bindValue(':created_at', date("Y-m-d H:i:s"));
    $state->execute();
}

function getNewsById($id, $name)
{
    include "data_baze.php";

    $sql_select = "select * from news." . $name . " where id = :id";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->execute();

    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateNews($id, $name, $content, $category_id, $author_id, $image)
{
    include "data_baze.php";

    $sql_update = "update news.news set name = :name, content = :content, category_id = :category_id, author_id = :author_id, image = :image where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->bindValue(':name', $name);
    $state->bindValue(':content', $content);
    $state->bindValue(':category_id', $category_id);
    $state->bindValue(':author_id', $author_id);
    $state->bindValue(':image', $image);
    $state->execute();
}

//-- news function_lar tugadi

//user function_lar boshlandi
function author_user($id): mixed
{
    include "data_baze.php";

    $sql_select = "select * from news.user where id = :id";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->execute();

    return $state->fetch(PDO::FETCH_ASSOC);
}

function userList()
{
    include "data_baze.php";

    $sql = "select * from news.user";
    $state = $dns->prepare($sql);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function userCategoryRead()//barcha kategoryalarni chiqarish usuli
{
    include "data_baze.php";

    $sql_select = "select * from news.category";
    $state = $dns->prepare($sql_select);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

//-- User_ga tegishli function_lar tugadi

//--- texnikalarga tegishli funksiyalar boshlandi
function addTexnik($name, $marka_id, $sum, $info, $categoryId, $authorId, $image)
{
    include "data_baze.php";

    $sql_insert = "insert into news.texnika (name, marka_id, sum, info, category_id, author_id, image)
                   values (:name, :marka_id, :sum, :info, :category_id, :author_id, :image)";
    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $name);
    $state->bindValue(':marka_id', $marka_id);
    $state->bindValue(':sum', $sum);
    $state->bindValue(':info', $info);
    $state->bindValue(':category_id', $categoryId);
    $state->bindValue(':author_id', $authorId);
    $state->bindValue(':image', $image);

    $state->execute();
}

function updateTexo($id, $name, $marka_id, $sum, $info, $category_id, $author_id, $image)
{
    include "data_baze.php";

    $sql_update = "update news.texnika set name = :name, marka_id = :marka_id, sum = :sum, info = :info, category_id = :category_id, author_id = :author_id, image = :image where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id);
    $state->bindValue(':name', $name);
    $state->bindValue(':marka_id', $marka_id);
    $state->bindValue(':sum', $sum);
    $state->bindValue(':info', $info);
    $state->bindValue(':category_id', $category_id);
    $state->bindValue(':author_id', $author_id);
    $state->bindValue(':image', $image);

    $state->execute();
}

//--- texnikalarga tegishli functionlar tugadi

//--- book functionlar boshlandi admin
function addbook($bookName, $bookText, $bookImage, $category_id, $author_id)
{
    include "data_baze.php";

    $sql_insert = "insert into news.book (name, text, image, category_id, author_id, created_at)
    values (:name, :text, :image, :category_id, :author_id, :created_at)";

    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $bookName);
    $state->bindValue(':text', $bookText);
    $state->bindValue(':image', $bookImage);
    $state->bindValue(':category_id', $category_id);
    $state->bindValue(':author_id', $author_id);
    $state->bindValue(':created_at', date("d-m-Y H:i:s"));

    $state->execute();
}

function dataWrite(int $page, string $name)
{
    include "data_baze.php";

    $limit = 5;
    $offset = ($page - 1) * $limit;

    $sql_select = "select * from news." . $name . " limit :offset, :limit";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':limit', $limit, PDO::PARAM_INT);
    $state->bindValue(':offset', $offset, PDO::PARAM_INT);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function Asc(string $table, string $columns)
{
    include "data_baze.php";

    $sql_sort = "select * from news. " . $table . " order by " . $columns . " asc";//asc
    $state = $dns->prepare($sql_sort);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function Desc(string $table, string $columns)
{
    include "data_baze.php";

    $sql_sort = "select * from news. " . $table . " order by " . $columns . " desc";
    $state = $dns->prepare($sql_sort);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function updateBook($id, $name, $text, $categoryId, $authorId, $image)
{
    include "data_baze.php";

    $sql_update = "update news.book set name = :name, text = :text, category_id = :category_id, author_id = :author_id, image = :image where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->bindValue(':name', $name);
    $state->bindValue(':text', $text);
    $state->bindValue(':category_id', $categoryId);
    $state->bindValue(':author_id', $authorId);
    $state->bindValue(':image', $image);
    $state->execute();
}

//book admin qismidagi funksiyalar tugadi

//avto admin qismi
function addAvto($name, $marka_id, $sum, $info, $categoryId, $authorId, $image)
{
    include "data_baze.php";

    $sql_insert = "insert into news.avto(name, marka_id, sum, info, category_id, author_id, image)
                   values (:name, :marka_id, :sum, :info, :category_id, :author_id, :image)";
    $state = $dns->prepare($sql_insert);
    $state->bindValue(':name', $name);
    $state->bindValue(':marka_id', $marka_id);
    $state->bindValue(':sum', $sum);
    $state->bindValue(':info', $info);
    $state->bindValue(':category_id', $categoryId);
    $state->bindValue(':author_id', $authorId);
    $state->bindValue(':image', $image);

    $state->execute();
}

function sortAvtoTex($name)
{
    include "data_baze.php";

    $sql_sort = "select * from news." . $name;
    $state = $dns->prepare($sql_sort);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function updateAvto($id, $name, $marka_id, $sum, $info, $category_id, $author_id, $image)
{
    include "data_baze.php";

    $sql_update = "update news.avto set name = :name, marka_id = :marka_id, sum = :sum, info = :info, category_id = :category_id, author_id = :author_id, image = :image where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id);
    $state->bindValue(':name', $name);
    $state->bindValue(':marka_id', $marka_id);
    $state->bindValue(':sum', $sum);
    $state->bindValue(':info', $info);
    $state->bindValue(':category_id', $category_id);
    $state->bindValue(':author_id', $author_id);
    $state->bindValue(':image', $image);

    $state->execute();
}

function updateAvtoCate($id, $name, $name_id)
{
    include "data_baze.php";

    $sql_update = "update news.avtocate set name = :title, name_id = :name_id where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->bindValue(':title', $name);
    $state->bindValue(':name_id', $name_id);
    $state->execute();
}
function updateTagCate($id, $name, $name_id)
{
    include "data_baze.php";

    $sql_update = "update news.texcate set name = :title, name_id = :name_id where id = :id";
    $state = $dns->prepare($sql_update);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->bindValue(':title', $name);
    $state->bindValue(':name_id', $name_id);
    $state->execute();
}

function getAvtoCateById(string $title, string $id): mixed
{
    include "data_baze.php";

    $sql_select = "select * from news." . $title . " where id = :id";
    $state = $dns->prepare($sql_select);
    $state->bindValue(':id', $id, PDO::PARAM_INT);
    $state->execute();

    return $state->fetch(PDO::FETCH_ASSOC);
}

//avto admin qismi tugadi

//user qismiga ko'rinadigan function_lar kitoblar kategoryasi
function bookCategory()
{
    include "data_baze.php";

    $sql_select = "select * from news.book order by category_id";
    $state = $dns->prepare($sql_select);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function bookWrite($page)
{
    include "data_baze.php";

    $limit = 12;
    $offset = ($page - 1) * $limit;

    $sql_select = ("select * from news.book limit :offset, :limit");
    $state = $dns->prepare($sql_select);
    $state->bindValue(':limit', $limit, PDO::PARAM_INT);
    $state->bindValue(':offset', $offset, PDO::PARAM_INT);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
}

function bookPegination($tableName)
{

    $limit = 12;
    include "data_baze.php";

    $sql_select = "select * from " . $tableName;
    $state = $dns->prepare($sql_select);
    $state->execute();
    $totalRows = $state->rowCount();

    return ceil($totalRows / $limit);
}

//user tarafga tegishlik funciyalar tugadi