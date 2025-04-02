<?php

if (isset ($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list", $json_e, strtotime("+1 day"), "/", "", "", TRUE);

}
?>

<div class="wait overlay">
	<div class="loader"></div>
</div>
<div class="container-fluid">
	<!-- row -->


	<div class="login-marg">
		<!-- Billing Details -->


		<!-- /Billing Details -->


		<form onsubmit="return false" id="login" class="login100-form ">
			<div class="section-title">
				<h2 class="login100-form-title p-b-49">Вход для клиентов</h2>
			</div>


			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="email" name="email" placeholder="Email" id="password" required>
			</div>

			<div class="form-group mt-3">
				<label for="email">Пароль</label>
				<input class="form-control" type="password" name="password" placeholder="Пароль" id="password" class="form-control" required>
			</div>
			<div class="form-group mt-3">
				<a href="" data-toggle="modal" data-target="#Modal_register" data-dismiss="modal" class="close_other ">Нет личного кабинета? Зарегистируйтесь!</a>
			</div>
			<input class="primary-btn btn-block btn mt-3" type="submit" Value="Войти">

		</form>

		<!-- Shiping Details -->

		<!-- /Shiping Details -->

		<!-- Order notes -->

		<!-- /Order notes -->
	</div>

	<!-- Order Details -->

	<!-- /Order Details -->

	<!-- /row -->
</div>

