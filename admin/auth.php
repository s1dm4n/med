<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(!isset($_SESSION['login_admin_id'])){
	header('Location: login.php');
	exit; // Важно завершить выполнение скрипта после перенаправления
}