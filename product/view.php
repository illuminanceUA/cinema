<?php

session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'films';

$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link, $db_database) or die("Нет соединения с БД " . mysqli_error());
mysqli_query($link, "SET names utf8");

$id =  $_GET['id'];
$name = $_GET['name'];
$date = $_GET['date'];
$time = $_GET['time'];

$filter = array(
    'name'=>$name,
    'date'=>$date,
    );


$res = mysqli_query($link,"SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_assoc($res);



$result_order = mysqli_query($link,"SELECT * FROM orders");

//echo "<pre>";
//var_dump($row_orders);

while($row_orders = mysqli_fetch_assoc($result_order)){

    $array[] = array(

        'name' => $row_orders['name'],
        'date' =>  $row_orders['date'],
        'time' =>  $row_orders['time'],
        'row' => $row_orders['row'],
        'place' => $row_orders['place'],
        'price' =>  $row_orders['price']

    );

}



$orders = json_encode($array);

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">    <link rel="stylesheet" href="../css/style.css">
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

<section class="about-movie">
   <div class="wrapper">

       <div class="movie-info">
           <div class="movie-info-title">
               <div class="movie-info-img">
                   <img src="../img/<? echo $data['image'];?>" alt="">
               </div>

               <div class="movie-info-name">
                   <span>Назва фільму</span>
                    <p class="movie-info-subtitle"><? echo $data['name'];?></p>
                   <div class="movie-info-time" href=""><? echo $time;?></div>
               </div>
           </div>
           <div class="movie-info-date">
               <i class="fas fa-calendar-week"></i> <? echo $data['date'];?>
           </div>
           <div data-price="<? echo $data['price'];?>" class="movie-price"><span>Ціна за квиток  </span><? echo $data['price'];?> <span>грн</span></div>
           <div class="movie-info-cart">

           </div>




       </div>
       <div class="movie-places">
            <div class="movie-screen"></div>
            <div class="places-wrapper">
                <div data-place="1" data-row="1" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))" class="place">1</div>
                <div data-place="2" data-row="1"   onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))" class="place">2</div>
                <div data-place="3" data-row="1"   onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">3</div>
                <div data-place="4" data-row="1"   onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">4</div>
                <div data-place="5" data-row="1"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">5</div>
                <div data-place="6" data-row="1" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"  class="place">6</div>
                <div data-place="7" data-row="2" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">7</div>
                <div data-place="8" data-row="2" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"  class="place">8</div>
                <div data-place="9" data-row="2" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">9</div>
                <div data-place="10" data-row="2" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">10</div>
                <div data-place="11" data-row="2" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">11</div>
                <div data-place="12" data-row="2"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">12</div>
                <div data-place="13" data-row="3"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">13</div>
                <div data-place="14" data-row="3"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">14</div>
                <div data-place="15" data-row="3"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">15</div>
                <div data-place="16" data-row="3"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">16</div>
                <div data-place="17" data-row="3"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">17</div>
                <div data-place="18" data-row="3" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">18</div>
                <div data-place="19" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">19</div>
                <div data-place="20" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">20</div>
                <div data-place="21" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">21</div>
                <div data-place="22" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">22</div>
                <div data-place="23" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">23</div>
                <div data-place="24" data-row="4"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">24</div>
                <div data-place="25" data-row="5"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">25</div>
                <div data-place="26" data-row="5"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">26</div>
                <div data-place="27" data-row="5"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">27</div>
                <div data-place="28" data-row="5"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">28</div>
                <div data-place="29" data-row="5"   onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"  class="place">29</div>
                <div data-place="30" data-row="5" onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">30</div>
                <div data-place="31" data-row="6"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">31</div>
                <div data-place="32" data-row="6"  onclick="placesBtn(this , this.getAttribute('data-place') , this.getAttribute('data-row'))"   class="place">32</div>
            </div>
       </div>
   </div>
</section>

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

<script src="/js/script.js"></script>
<script>
    let orders = <? echo $orders; ?>;
    renderOrderedPlaces(orders);
</script>
</body>
</html>