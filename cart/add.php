<?php

session_start();

$data = json_decode(file_get_contents("php://input"),true);

$productsInCart = array();

// Если в корзине уже есть товары (они хранятся в сессии)
if (!empty($_SESSION['cart'])) {

    // То заполним наш массив товарами
    foreach ($data as $key => $value){

        $_SESSION['cart'][] = $value;
    }
}
else{
    $_SESSION['cart'] = $data;
}

//header("location:/cart");


