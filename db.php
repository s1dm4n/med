<?php
//подключаюсь к базе shop_db, детали подключения в 
$servername = "localhost";
$username = "root";
$password = "";
$db = "shop_db";


$con = mysqli_connect($servername, $username, $password,$db);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>