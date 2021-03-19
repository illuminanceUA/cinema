<?php

include("include/db_connect.php");

session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");
$result = mysqli_query($link,"SELECT * FROM products");


//unset($_SESSION['cart']);
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">    <link rel="stylesheet" href="css/style.css">
    <title>Cinema</title>
</head>
<body>
    <header class="header">
        <div class="wrapper">
            <div class="header-content">
                <div style="display: flex ; align-items: center">
                    <div class="header-logo">

                    </div>
                    <div class="main-link">
                        <a href="/">Фільми</a>
                    </div>
                </div>
                <div class="header-search">
                  <!--  <input type="text">
                    <i class="fas fa-search"></i>-->
                </div>
                <div class="header-cart">
                    <a href="/cart"><i class="fas fa-shopping-cart"></i></a>
                   <!-- <i class="fas fa-shopping-cart"></i>-->
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <h1 class="list-title">
            Cписок фільмів
        </h1>

        <div class="list">

<? while ($res = mysqli_fetch_array($result)) {


    echo '    <div class="card">
                <div class="front">';?>
                    <div class="movie-img" style="background: url(' ./img/<? echo $res['image']; ?>') no-repeat center; background-size: cover;">

                        <?      echo '   </div>
                </div>
                <div class="back">
                    <p class="movie-descr">Жанр : '.$res['genre'].'</p>
                    <p class="movie-descr">Режисер : '.$res['director'].'</p>
                    <p class="movie-date">'.$res['date'].'</p>
                    <div class="movie-times">';

                      $tt =  explode(",", $res['time']);
                       foreach ($tt as $time) {

                           echo ' <a href="/product/view.php?id='.$res['id'].'&name='.$res['name'].'&date='.$res['date'].'&time='.$time.'">'.$time.'</a>';

                      }



            echo '       </div>
                </div>
                <p class="movie-name">
                    '.$res['name'].'
                <p>
            </div>';
}
            ?>

        </div>

    </div>

    <footer class="footer">
        <div class="wrapper">
            <div class="footer-content">
                <a href="/">Фільми</a>
                <div class="header-logo">

                </div>
                <a href="/cart">Кошик</a>
            </div>
        </div>
    </footer>

</body>
</html>