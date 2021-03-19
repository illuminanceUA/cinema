<?php
session_start();



$productsCart = $_SESSION['cart'];
$id = $_GET['id'];
unset($productsCart[$id]);

$newProductsCart = array();

foreach($productsCart as $key => $value) {
    array_push($newProductsCart , $value);
}


if (isset($newProductsCart) || !empty($newProductsCart)){
    $_SESSION['cart'] = $newProductsCart;
}else{
    unset($_SESSION['cart']);
}



print_r(json_encode($newProductsCart));

?>