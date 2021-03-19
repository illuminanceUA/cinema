<?php

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");

//Удаление кина полностью
$id = $_GET['id'];

if (isset($_GET['name']) || !empty($_GET['name'])){
    $name = $_GET['name'];

}else{
    header("location:/admin");
}


$collection = mysqli_query($link, "DELETE FROM `orders` WHERE `id`='$id'");



$directory = $_SERVER['DOCUMENT_ROOT']."/img";
$name = $name.'.jpg';

if (file_exists($directory . '/' . $name)) {
    unlink($directory . '/' . $name);
}

header("location:/admin/orders.php");