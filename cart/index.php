<?php
session_start();

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
               <!-- <input type="text">
                <i class="fas fa-search"></i>-->
            </div>
            <div class="header-cart">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>
</header>
<?
//unset($_SESSION['cart']);

//var_dump($_SESSION['cart']);
if($_SESSION['cart'] == NULL){

    echo '<section class="cart">
    <div class="wrapper">
        <div class="cart-content">
            <div class="cart-info">
                <p class="cart-title">
                    Ваша корзина пуста
                </p>
               
            </div>
        </div>
    </div>
</section>';
}else {




echo '
<section class="cart">
    <div class="wrapper">
        <div class="cart-content">
            <div class="cart-info">
                <p class="cart-title">
                    Твоє замовлення у кошику:
                </p>
                <div class="cart-movies">
                    <div class="cart-movie">
                        <p class="cart-movie-name">
                            Головна подія
                        </p>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>ряд</p>
                        </div>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>місце</p>
                        </div>
                        <p class="cart-movies-price">
                            70 <span>грн</span>
                        </p>
                        <div class="remove-movie">
                            &times;
                        </div>
                    </div>
                    <div class="cart-movie">
                        <p class="cart-movie-name">
                            Головна подія
                        </p>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>ряд</p>
                        </div>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>місце</p>
                        </div>
                        <p class="cart-movies-price">
                            70 <span>грн</span>
                        </p>
                        <div class="remove-movie">
                            &times;
                        </div>
                    </div>
                    <div class="cart-movie">
                        <p class="cart-movie-name">
                            Головна подія
                        </p>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>ряд</p>
                        </div>
                        <div class="cart-info-number">
                            <span>
                                1
                            </span>
                            <p>місце</p>
                        </div>
                        <p class="cart-movies-price">
                            70 <span>грн</span>
                        </p>
                        <div class="remove-movie">
                            &times;
                        </div>
                    </div>
                </div>
            </div>
            <div class="order">
                <h3 class="order-title">
                    Оформити замовлення
                </h3>';

          echo '     <form  action="/order/add.php" method="post">
                    <p>Ваше имя</p>
                    <input type="text" name="name">
                    <p>Ваш номер</p>
                    <input type="number" name="phone">
                    <p>Ваше mail</p>
                    <input type="email" required name="email">
                    <button value="submit" name="submit" class="submit-order">
                        Відправити замовлення
                    </button>
                </form>';

                echo '
            </div>
        </div>
    </div>
</section>';

}  ?>



<footer class="footer">
    <div class="wrapper">
        <div class="footer-content">
            <a href="/">Фільми</a>
            <div class="header-logo">

            </div>
        </div>
    </div>
</footer>

<script src="/js/script.js"></script>
<script>
    renderCart();
</script>
</body>
</html>