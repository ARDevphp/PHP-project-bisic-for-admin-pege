<?php

declare(strict_types=1);

$host = 'localhost';
$db_user = 'root';
$db_password = '';
$dbname = 'news';

try {
    $dns = new PDO("mysql:host=$host;dbname=$dbname", $db_user, $db_password);
    }catch (PDOException $e) {
    $object = $e->getMessage();
    echo $object;
}

