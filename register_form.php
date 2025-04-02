<div class="wait overlay">
	<div class="loader"></div>
</div>


<!-- row -->

<div class="container-fluid">



	<!-- /Billing Details -->

	<form id="signup_form" onsubmit="return false" class="login100-form">
		<div class="section-title">
			<h2 class="login100-form-title p-b-49">Регистрация</h2>
		</div>
		<div class="form-group mt-2 ">
			<label for="f_name">Ваше имя *</label>
			<input class="form-control" type="text" name="f_name" id="f_name"  required>
		</div>
		<div class="form-group mt-2">
		<label for="l_name">Фамилия *</label>
			<input class="form-control" type="text" name="l_name" id="l_name"  required>
		</div>
		<div class="form-group mt-2">
		<label for="u_email">Email *</label>
			<input class="form-control" type="email" name="u_email" id="u_email" required>
		</div>
		<div class="form-group mt-2">
		<label for="u_password">Пароль *</label>
			<input class="form-control" type="password" name="u_password" id="u_password"
				 required>
		</div>
		<div class="form-group mt-2">
		<label for="u_repassword">Пароль (еще раз) *</label>
			<input class="form-control" type="password" name="u_repassword" id="u_repassword" required>
		</div>
		<div class="form-group mt-2">
			<label for="mobile">Мобильный телефон</label>
			<input class="form-control" type="text" name="mobile" id="mobile">
		</div>
		<div class="form-group mt-2">
			<label for="address1">Город</label>
			<input class="form-control" type="text" name="address1" id="address1">
		</div>
		<div class="form-group mt-2">
			<label for="address1">Адрес</label>
			<input class="form-control" type="text" name="address2" id="address2">
		</div>

		<div class="form-check mt-2">
							<input type="checkbox" class="form-check-input" id="exampleCheck1" checked wfd-id="id3">
							<label class="form-check-label" for="exampleCheck1">Нажимая кнопку, Вы соглашаетесь с правилами сайта</label>
						</div>

		<div style="form-group">
			<input class="btn mt-3" value="Регистрация" type="submit" name="signup_button">
		</div>




	</form>
	<div class="login-marg">
		<!-- Billing Details -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-12 mt-3" id="signup_msg">


			</div>
			<!--Alert from signup form-->
		</div>
		<div class="col-md-2"></div>
	</div>


</div>
</div>



<!-- /row -->