<?php

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");


if (isset($_POST['submit']) && !empty($_POST['name'])) {



    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $row = $_POST['row'];
    $place = $_POST['place'];
    $price = $_POST['price'];

    // добавление  в коллекцию


    $collection = mysqli_query($link,"UPDATE `orders` SET 
        name='$name', 
        date='$date', 
        time='$time', 
        row='$row', 
        place='$place', 
        price='$price'
        WHERE id='$id'");




    header("location:/admin/orders.php");
}else{
    header("location:/admin/orders.php");
}

