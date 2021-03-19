<?php

//include("include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");



//Вывод данных в админке
$result = mysqli_query($link, "SELECT * FROM products");

//Обновление данных кино

if (isset($_GET['id']) || !empty($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("location:/admin");
}

$documents = mysqli_query($link,"SELECT * FROM products WHERE `id`='$id'");
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
    <form method="post" action="/php/update.php" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id" value="<? echo $_GET['id'];?>">
        <input class="form-control" type="hidden" name="name_old" value="<? echo $_GET['name'];?>">
         <label class="form-label">Название</label>  <input class="form-control" type="text" placeholder="Название фильма" value="<? echo $document['name'];?>" name="name"><br>
        <label class="form-label"> Жанр</label>  <input class="form-control" type="text" placeholder="Жанр" value="<? echo $document['genre'];?>" name="genre"><br>
         <label class="form-label">Дата</label>   <input class="form-control" type="date" placeholder="Дата" value="<? echo $document['date'];?>" name="date"><br>
        <label class="form-label" for="">Время сеансов:  </label>
        <?
        $times = explode(",", $document['time']);
        ?>

        <div class="row">
            <div class="col-3 mb-2">
                <select class=" form-control " name="time1" value="<? echo $times[0];?>"  id="">
                    <option value="<? echo $times[0];?>"><? echo "Старое время:  ". $times[0];?></option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
            <div class="col-3 mb-2">
                <select class=" form-control" name="time2"  id="">
                    <option value="<? echo $times[1];?>"><? echo "Старое время:  ". $times[1];?></option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
            <div class="col-3 mb-2">
                <select class=" form-control" name="time3" id="">
                    <option value="<? echo $times[2];?>" ><? echo "Старое время:  ". $times[2];?></option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>


        </div>


        <label for="" class="form-label"> Режисер:</label> <input class="form-control" type="text" value="<? echo $document['director'];?>" name="director"><br>
        <label for="" class="form-label"> Цена:</label><input class="form-control" type="text" value="<? echo $document['price'];?>"  name="price"><br>
        <p class="form-text"><? echo "Фото: ". $document['image'];?></p>
        <input class="form-control" style="border: 0" type="file" name="image" value="<? echo $document['image'];?>" multiple>

        <input style="margin-bottom: 30px; margin-top: 20px;display: block;width: 150px;padding: 5px; text-align: center;border-radius: 5px ; background: #000; color: #fff;text-decoration: none" type="submit" name="submit" value="submit">
    </form>
</div>




</body>
</html>


