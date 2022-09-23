<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'db_site_dosaaf';

$conn = new MySQLi($host, $user, $pass, $db_name);

if($conn->connect_errno)
{
    die('База данных: ошибка подлючения: '.$conn->connect_errno);
}
else
{
    // echo 'База данных подключена успешно';
}