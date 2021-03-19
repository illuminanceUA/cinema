<?php
session_start();

if (!empty($_SESSION['cart']) || isset($_SESSION['cart'])){
    $r = $_SESSION['cart'];
    $r2 = json_encode($r);
    print_r($r2);
}else{
    $r = array();
    $r2 = json_encode($r);
    print_r($r2);
}
