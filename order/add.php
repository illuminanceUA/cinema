<?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");


$cart = $_SESSION['cart'];



$res = array();
foreach ($cart as $key => $value){
    $date = $value['date'];
    $time = $value['time'];
    $name_cin = $value['name'];
    $row[] = $value['row'];
    $place[] = $value['place'];
    $price = $value['price'];
    $mes[] = "Дата:$date\nВремя:$time\nНазвание:$name_cin\nРяд:$row[$key]\nМесто:$place[$key]";

    if (in_array($value['row'],$res)){
        continue;
    }else{
        $res[] = array($value['row']=>$value['place']);
    }
}



$mess = implode("\n----",$mes);

if (isset($_POST['submit']) && !empty($_POST['email'])){
    if (!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = "";
    }
    if (!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $name = "";
    }
    if (!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $name = "";
    }

    $mess_2 = "Имя:$name\nПочта:$email\nТелефон:$phone\n";
    $message = $mess_2.$mess;


    foreach ($row as $k => $v){

        $collection = mysqli_query($link,"INSERT INTO `orders`(`name`, `date`, `time`, `row`, `place`, `price`) VALUES (
        '$name_cin',
        '$date',
        '$time',
        '$v',
        '$place[$k]',
        '$price'
        )");

    }

    $last_id = mysqli_insert_id($link);

    $collection2 = mysqli_query($link,"INSERT INTO `clients`(`order_id`, `name`, `email`, `phone`) VALUES (
        '$last_id',
        '$name',
        '$email',
        '$phone'
        )");


    $mail = mail($email, "Покупка билетов!", $message);
    if ($mail){
        unset($_SESSION['cart']);
    }

  header("location:/");

}