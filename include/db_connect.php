<?php
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= 'root';
$db_database	= 'films';

$link = mysqli_connect($db_host,$db_user,$db_pass);

mysqli_select_db($link,$db_database) or die("Нет соединения с БД ".mysqli_error());
mysqli_query($link,"SET names utf8");

?>