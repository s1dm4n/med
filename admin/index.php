<?php
session_start();
include("../db.php");
include './auth.php';
?>
<!doctype html>
<html lang="ru">
<?php include 'header.php' ?>
<body>
<?php 
include "sidenav.php";
include "topheader.php";
?>
<main id="view-panel">
    <div class="container-fluid">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page.'.php';
        ?>
    </div>
</main>
</body>
<script type="text/javascript">
    window.start_load = function(){
        $('body').append('<div id="preloader2"></div>');
    }
    window.end_load = function(){
        $('body #preloader2').remove();
    }
</script>
</html>