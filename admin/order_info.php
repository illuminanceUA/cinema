<?php

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");

$id = $_GET['id'];

//Вывод данных в админке
$result = mysqli_query($link,"SELECT * FROM orders where id='$id'");



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
    <h3>СТРАНИЦА ЗАКАЗА</h3>
    <table class="table table-hover">

        <tr>
            <td>Название фильма</td>
            <td>Дата</td>
            <td>Время</td>
            <td>Ряд</td>
            <td>Место</td>
            <td>Цена</td>
            <td>Редактирование</td>
            <td>Удаление</td>
        </tr>

        <? while($res = mysqli_fetch_assoc($result)){


            echo '
    <tr>
        <td>'.$res['name'].'</td>
        <td>'.$res['date'].'</td>
        <td>'.$res['time'].'</td>  
        <td>'.$res['row'].'</td>
        <td>'.$res['place'].'</td>
        <td>'.$res['price'].'</td>
        <td><a href="/admin/order_update.php?id='.$res['id'].'&name='.$res['name'].'">Редактировать</a></td> 
        <td><a href="/admin/order_delete.php?id='.$res['id'].'&name='.$res['name'].'">Удалить</a></td>
    </tr>';

        }
        ?>



    </table>
</div>


<!--<a href="/admin/create.php">Создать фильм</a>-->

</body>
</html>
