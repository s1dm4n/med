<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title>Cruton - Наслаждайтесь отдыхом с нашими колёсами</title>
	<meta name="description" content="CRUTON - СЕРВИС АРЕНДЫ АВТОМОБИЛЕЙ И УСЛУГ К НИМ">

	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="../images/favicon.png">

	<link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../libs/swiper/swiper-bundle.min.css">

	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/media.css">


	<!-- defer я использовал для загрузки всех js в конце документа, чтобы сократить footer.php -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" defer></script>
	<script src="../libs/swiper/swiper-bundle.min.js" defer></script>
	<script src="../js/common.js" defer></script>
	<script src="../js/jquery.min.js" defer></script>
		<script src="../js/bootstrap.min.js" defer></script>
		<script src="../js/main.js" defer></script>
		<script src="../js/actions.js" defer></script>
    <script src="../js/script.js" defer></script>
		<script defer>var c = 0;
        function menu(){
          if(c % 2 == 0) {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";    
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";    
            c++; 
              }else{
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";        
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";        
            c++;
              }
        }
           
		
</script>


</head>

<body>
	<header>
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-5 col">
					<div class="d-flex align-items-center">
						<a href="/" class="logo">
							<img src="../images/logo.png" loading="lazy">
						</a>
						<form class="form-inline  d-lg-flex d-none" id="filter-search">
							<div class="form-group mx-sm-3">
								<input type="text" class="form-control" id="search"
									value="<?php echo isset ($_GET['filter']) ? $_GET['filter'] : '' ?>"
									placeholder="Например: Аренда машиноместа">
							</div>
							<button type="submit" class="btn">Найти</button>
						</form>
					</div>
				</div>
				<div class="col-4 d-lg-block d-none">
					<nav>
						<ul>
							<li>
								<a href="../store.php?filter=Услуги#">
								<svg fill="#000000" width="24px" height="24px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
										<g>
											<path
												d="M1,19H5V15H1Zm7,0h4V15H8Zm7,0h4V15H15ZM1,12H5V8H1Zm7,0h4V8H8Zm7,0h4V8H15ZM1,5H5V1H1ZM8,5h4V1H8Zm7-4V5h4V1Z" />
										</g>
									</svg>
									Услуги
								</a>
							</li>
							<li>
								<a href="../store.php?filter=Автомобили#">
									<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z"
											stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
									Автомобили
								</a>
							</li>
							<li>
								<a href="../store.php?filter=Товары#">
								<svg fill="#000000" height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 372.372 372.372" xml:space="preserve">
<g>
	<path d="M368.712,219.925c-5.042-8.951-14.563-14.511-24.848-14.511c-4.858,0-9.682,1.27-13.948,3.672l-83.024,46.756
		c-1.084,0.61-1.866,1.642-2.163,2.85c-1.448,5.911-4.857,14.164-12.865,19.911c-8.864,6.361-20.855,7.686-35.466,3.939
		c-0.088-0.022-0.175-0.047-0.252-0.071L148.252,267.6c-2.896-0.899-4.52-3.987-3.621-6.882c0.72-2.316,2.83-3.872,5.251-3.872
		c0.55,0,1.101,0.084,1.634,0.249l47.645,14.794c0.076,0.023,0.154,0.045,0.232,0.065c11.236,2.836,20.011,2.047,26.056-2.288
		c7.637-5.48,8.982-15.113,9.141-16.528c0.006-0.045,0.011-0.09,0.014-0.136c0.003-0.023,0.004-0.036,0.005-0.039
		c0.001-0.015,0.002-0.03,0.003-0.044c0.001-0.01,0.001-0.019,0.002-0.029c0.909-11.878-6.756-22.846-18.24-26.089l-0.211-0.064
		c-0.35-0.114-35.596-11.626-58.053-18.034c-2.495-0.711-9.37-2.366-19.313-2.366c-13.906,0-34.651,3.295-54.549,19.025
		L1.67,292.159c-1.889,1.527-2.224,4.278-0.758,6.215l44.712,59.06c0.725,0.956,1.801,1.584,2.99,1.744
		c0.199,0.027,0.398,0.04,0.598,0.04c0.987,0,1.954-0.325,2.745-0.935l57.592-44.345c1.294-0.995,3.029-1.37,4.619-0.995
		l93.02,21.982c6.898,1.63,14.353,0.578,20.523-2.9l130.16-73.304C371.555,251.012,376.418,233.61,368.712,219.925z"/>
	<path d="M316.981,13.155h-170c-5.522,0-10,4.477-10,10v45.504c0,5.523,4.478,10,10,10h3.735v96.623c0,5.523,4.477,10,10,10h142.526
		c5.523,0,10-4.477,10-10V78.658h3.738c5.522,0,10-4.477,10-10V23.155C326.981,17.632,322.503,13.155,316.981,13.155z
		 M253.016,102.417h-42.072c-4.411,0-8-3.589-8-8c0-4.411,3.589-8,8-8h42.072c4.411,0,8,3.589,8,8
		C261.016,98.828,257.427,102.417,253.016,102.417z M306.981,58.658h-3.738H160.716h-3.735V33.155h150V58.658z"/>
</g>
</svg>
									Товары
								</a>
							</li>
							<li>
								<a href="../information/tariffs.php">
								<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M3 9.5H21M3 14.5H21M8 4.5V19.5M6.2 19.5H17.8C18.9201 19.5 19.4802 19.5 19.908 19.282C20.2843 19.0903 20.5903 18.7843 20.782 18.408C21 17.9802 21 17.4201 21 16.3V7.7C21 6.5799 21 6.01984 20.782 5.59202C20.5903 5.21569 20.2843 4.90973 19.908 4.71799C19.4802 4.5 18.9201 4.5 17.8 4.5H6.2C5.0799 4.5 4.51984 4.5 4.09202 4.71799C3.71569 4.90973 3.40973 5.21569 3.21799 5.59202C3 6.01984 3 6.57989 3 7.7V16.3C3 17.4201 3 17.9802 3.21799 18.408C3.40973 18.7843 3.71569 19.0903 4.09202 19.282C4.51984 19.5 5.07989 19.5 6.2 19.5Z"
											stroke="#000000" stroke-width="2" />
									</svg>
									Тарифы
								</a>
							</li>
							<li>
								<a href="../cart.php">

									<svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
										width="24px" height="24px" viewBox="0 0 902.86 902.86"
										xml:space="preserve">
									<g>
										<g>
											<path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z
												M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"/>
											<path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717
												c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744
												c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742
												C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744
												c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z
												M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742
												S619.162,694.432,619.162,716.897z"/>
										</g>
									</g>
									</svg>
									Корзина
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-3 col">
					<div class="align-items-center justify-content-end d-lg-flex d-none">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Информация
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="../information/faq.php">Вопросы и ответы</a>
								<a class="dropdown-item" href="../information/partners.php">Партнеры</a>
								<a class="dropdown-item" href="../information/about.php">О компании</a>
								<a class="dropdown-item" href="../information/tariffs.php">Тарифы</a>
								<a class="dropdown-item" href="../information/contacts.php">Контакты</a>
							</div>
						</div>
						<?php include "db.php";
							if (isset ($_SESSION["uid"])) {
								$sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
								$query = mysqli_query($con, $sql);
								$row = mysqli_fetch_array($query);

								echo '
								<a href="../profile.php" class="dropdown btn" >Профиль</a>
								<a href="../logout.php" class="link-btn ml-3">Выйти</a>
								';

							} else { 
						echo '<a href="#" data-toggle="modal" data-target="#Modal_login" class="btn ml-2">Войти</a>';
							}?>
					</div>
					<div class="d-lg-none d-flex justify-content-end">
						<button class="menu_button">
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="modal fade" id="Modal_login" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content  form_wrap">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times; закрыть</button>

				</div>
				<div class="modal-body">
					<div id="msg"></div>
					<?php
					include "login_form.php";

					?>

				</div>

			</div>

		</div>
	</div>
	<div class="modal fade" id="Modal_register" role="dialog">
		<div class="modal-dialog" style="">

			<!-- Modal content-->
			<div class="modal-content form_wrap">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times; закрыть</button>

				</div>
				<div class="modal-body">
					<?php
					include "register_form.php";

					?>

				</div>

			</div>

		</div>
	</div>