<?php

//Обновление данных кино

//include(".include/db_connect.php");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");



if (isset($_POST['submit']) && !empty($_POST['name'])) {

    $name_old = $_POST['name_old'];


    $id = $_POST['id'];
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $date = $_POST['date'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
    $director = $_POST['director'];
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
    $collection = mysqli_query($link,"UPDATE `products` SET 
        name='$name', 
        price='$price', 
        genre='$genre', 
        date='$date', 
        time='$times[0]', 
        director='$director',
        image='$photo' 
        WHERE id='$id'");

    $photo = $name.".jpg";
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/img";

    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        move_uploaded_file($_FILES['image']['tmp_name'], "$uploaddir/$photo");

    }

   header("location:/admin");
}else{
   header("location:/admin");
}

