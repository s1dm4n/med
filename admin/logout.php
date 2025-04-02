<?php
session_start();
session_destroy();
foreach ($_SESSION as $key => $value) {
	unset($_SESSION[$key]);
}
header('location:login.php');
exit; // Не забудьте добавить exit или die() после header, чтобы прервать выполнение скрипта
