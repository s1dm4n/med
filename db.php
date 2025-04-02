<?php
//подключаюсь к базе shop_db, детали подключения в 
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$db = "shop_db";


$con = mysqli_connect($servername, $username, $password,$db);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>