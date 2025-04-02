<?php 
session_start();
include 'header.php';
if(isset($_SESSION['login_admin_id'])){
    header('Location:index.php?page=home');
    exit; // Добавляем выход, чтобы код ниже не выполнялся, если перенаправление уже произошло
}
?>
<!DOCTYPE html>
<html lang="ru">
	<style>
		.btn{
	display: inline-block;
	padding: 8px 18px;
	text-align: center;
	background: #FFC191;
	color: #fff;
	text-decoration: none;
	border: none;
}
.btn:hover{
	background: #FFC191;
}
	</style>
<body>
    <main>    
        <div class="container-fluid">            
				<div class="row mt-5 mb-4">
								<div class="col">
								<h1 class="text-center" style="text-align: center;">Вход в панель администора Cruton</h1>
								<img src="../images/logo.png" alt="" style="margin: 0 auto; display: block;">
								</div>
							</div>
                <div class="row">
								<div class="col-md-4 offset-4 card">
                        <div class="card-body">
                            <form action="" id="login-frm">
                                <div class="form-group">
                                    <label for="username" class="control-label">Логин администратор</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Пароль</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <center>
                                    <button class="btn btn-block col-md-5 btn-primary">Войти в панель</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <?php //include 'footer.php' ?>
</body>
<script>
    $(document).ready(function(){
        $('#login-frm').submit(function(e){
            e.preventDefault()
            start_load()
            $.ajax({
                url:'authenticate.php',
                method:'POST',
                data:$(this).serialize(),
                error:err=>{
                    console.log(err)
                },
                success:function(resp){
                    if(resp == 1){
                        location.replace('index.php?page=home')
                    }
                }
            })
        })
    })
    window.start_load = function(){
        $('body').append('<div id="preloader2"></div>');
    }
    window.end_load = function(){
        $('body #preloader2').remove();
    }
</script>
</html>
