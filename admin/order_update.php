<?php

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");



//Вывод данных в админке
//$result = mysqli_query($link, "SELECT * FROM products");

//Обновление данных кино

if (isset($_GET['id']) || !empty($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("location:/admin");
}

$documents = mysqli_query($link,"SELECT * FROM orders WHERE `id`='$id'");
$document = mysqli_fetch_assoc($documents);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css" integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<header style="background: #000 ; padding: 10px 0;margin-bottom: 30px">
    <div class="container">
        <a style="color: #fff; text-decoration: none; padding-right: 20px" href="/admin/index.php">Фільми</a>
        <a style="color: #fff; text-decoration: none; padding-right: 20px"  href="/admin/orders.php">Замовлення</a>
        <a style="color: #fff; text-decoration: none; padding-right: 20px"  href="/">До сайту</a>
    </div>
</header>

<div class="container">
    <form method="post" action="/php/order_update.php" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id" value="<? echo $_GET['id'];?>">
        <input class="form-control" type="hidden" name="name_old" value="<? echo $_GET['name'];?>">
        <label class="form-label" for="">Название</label>   <input type="text" class="form-control" placeholder="Название" value="<? echo $document['name'];?>" name="name"><br>
        <label for="" class="form-label"> Время</label> <input type="text" class="form-control" placeholder="Время" value="<? echo $document['time'];?>" name="time"><br>
        <label class="form-label">Дата</label> <input type="date" class="form-control" placeholder="Дата" value="<? echo $document['date'];?>" name="date"><br>
        <label class="form-label">Ряд</label> <input type="text" class="form-control" placeholder="Ряд" value="<? echo $document['row'];?>" name="row"><br>
        <label class="form-label">Место</label> <input type="text" class="form-control" placeholder="Место" value="<? echo $document['place'];?>" name="place"><br>
        <label  class="form-label">Цена</label> <input type="text" class="form-control" placeholder="Цена" value="<? echo $document['price'];?>" name="price"><br>
        <input style="margin-bottom: 30px;display: block;width: 150px;padding: 5px; text-align: center;border-radius: 5px ; background: #000; color: #fff;text-decoration: none" type="submit" name="submit" value="submit">

    </form>

</div>



</body>
</html>


