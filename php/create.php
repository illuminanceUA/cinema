<?php

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");


if (isset($_POST['submit']) && isset($_POST['name'])){

    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $date =  $_POST['date'];
    $director = $_POST['director'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
    $price = $_POST['price'];
    $photo = $_FILES['image']['name'];
    $photo = $name . '.jpg';


    $time[] = array(
        $time1,
        $time2,
        $time3
    );
    foreach ($time as $key => $value){
       $times[] = implode(',',$value);

    }

////добавление  в коллекцию
    $collection = mysqli_query($link,"INSERT INTO `products`(`name`, `price`, `genre`, `date`, `time`, `director`, `image`) VALUES (
        '$name',
        '$price',
        '$genre',
        '$date',
        '$times[0]',
        '$director',
        '$photo'
        )");

    $photo = $name.".jpg";
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/img";
    move_uploaded_file($_FILES['image']['tmp_name'], "$uploaddir/$photo");



}
header("location:/admin");

