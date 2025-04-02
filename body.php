
<div class="first_screen d-flex flex-column justify-content-center" style="background-image: url('./images/bg.jpg');">
	<div class="container">
		<div class="row ">
			<div class="col-lg-8">
				<div class="first_screen_wrap white">
					<h1 class="one">
						Cruton - Сервис аренды автомобилей и услуг к ним
					</h1>
					<p class="mt-4">Мы предоставляем в аренду более 20 марок автомобилей</p>
					<a href="#" data-toggle="modal" data-target="#Modal_register" class="btn mt-1">Зарегистрироваться</a>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-10">
				<h2 class="section-title">Аренда автомобилей</h2>
			</div>
			<div class="col">
				<div class="slider_nav d-none d-lg-flex justify-content-end align-items-center">
					<div class="prev_btn prev_cars">
						<img src="./images/arrow-up-left.svg">
					</div>
					<div class="next_btn next_cars">
						<img src="./images/arrow-up-right.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-1 mt-lg-5">
			<div class="carousel main_carousel">
				<div class="swiper-wrapper">
				<?php
                    include 'db.php';
								
					//6 - это номер категории, находящаяся в базе данных в таблице categories
					$product_query = "SELECT * FROM products WHERE product_cat=6 ORDER BY product_id DESC;";
                $run_query = mysqli_query($con,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['product_cat'];
                        $pro_brand = $row['product_brand'];
                        $pro_title = $row['product_title'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];

                       

                        ?>
					<div class="swiper-slide">
						<div class="product_item">
						<img src="product_images/<?php echo $row['product_image'] ?>" loading="lazy">
						<!-- Использую lazy, потому что в слайдере важно не загружать картинки, которые вне ширины браузера -->
							<h3><?php echo $row['product_title'] ?></h3>
							<div class="text">от <?php echo $row['product_price'] ?> руб.\сутки</div>
							<div class="hover_block">
								<a href="product.php?p=<?php echo $row['product_id'] ?>" class="btn">Подробнее</a>
							</div>
						</div>
					</div>
					<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-10">
				<h2 class="section-title">Дополнительные услуги</h2>
			</div>
			<div class="col">
				<div class="slider_nav d-none d-lg-flex justify-content-end align-items-center">
					<div class="prev_btn prev_service">
						<img src="./images/arrow-up-left.svg">
					</div>
					<div class="next_btn next_service">
						<img src="./images/arrow-up-right.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-1 mt-lg-5">
			<div class="col-12">
			<div class="services  main_carousel">
				<div class="swiper-wrapper">
				<?php
                    include 'db.php';
								
					
								$services_query = "SELECT * FROM products WHERE product_cat=7 ORDER BY product_id DESC;";
                $run_query = mysqli_query($con,$services_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['product_cat'];
                        $pro_brand = $row['product_brand'];
                        $pro_title = $row['product_title'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];



                        ?>
					<div class="swiper-slide">
						<div class="product_item">
						<img src="product_images/<?php echo $row['product_image'] ?>" loading="lazy">
						<!-- Использую lazy, потому что в слайдере важно не загружать картинки, которые вне ширины браузера -->
							<h3><?php echo $row['product_title'] ?></h3>
							<div class="text">от <?php echo $row['product_price'] ?> руб.\сутки</div>
							<div class="hover_block">
								<a href="product.php?p=<?php echo $row['product_id'] ?>" class="btn">Подробнее</a>
							</div>
						</div>
					</div>
					<?php }
					} ?>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-10">
				<h2 class="section-title">Товары</h2>
			</div>
			<div class="col">
				<div class="slider_nav d-none d-lg-flex justify-content-end align-items-center">
					<div class="prev_btn prev_product">
						<img src="./images/arrow-up-left.svg">
					</div>
					<div class="next_btn next_product">
						<img src="./images/arrow-up-right.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-1 mt-lg-5">
			<div class="col-12">
			<div class="product_carousel  main_carousel">
				<div class="swiper-wrapper">
				<?php
                    include 'db.php';
								
					
								$services_query1 = "SELECT * FROM products WHERE product_cat=8 ORDER BY product_id DESC;";
                $run_query = mysqli_query($con,$services_query1);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['product_cat'];
                        $pro_brand = $row['product_brand'];
                        $pro_title = $row['product_title'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];


                        ?>
					<div class="swiper-slide">
						<div class="product_item">
						<img src="product_images/<?php echo $row['product_image'] ?>" loading="lazy">
						<!-- Использую lazy, потому что в слайдере важно не загружать картинки, которые вне ширины браузера -->
							<h3><?php echo $row['product_title'] ?></h3>
							<div class="text"><?php echo $row['product_price'] ?> / шт.</div>
							<div class="hover_block">
								<a href="product.php?p=<?php echo $row['product_id'] ?>" class="btn">Подробнее</a>
							</div>
						</div>
					</div>
					<?php }
					} ?>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section-title">Тарифы</h2>
			</div>
		</div>
		<div class="row mt-lg-5 mt-1 gy-2 gy-lg-0">
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center">
						<div>
							<h3 class="mb-lg-3 mb-2">Тариф "Все включено"</h3>
						<h4>от 10000 руб \ сутки *</h4>
						<p>Автомобиль на выбор</p>
						<p>Доставка автомобиля</p>
						<p>Аренда машиноместа</p>
						</div>
						<div>
							<a href="#" class="btn mt-4">Заказать тариф</a>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center">
						<div>
							<h3 class="mb-lg-3 mb-2">Тариф "Семейный"</h3>
						<h4>от 12000 руб \ сутки *</h4>
						<p>Автомобиль на выбор</p>
						<p>Аренда машиноместа</p>
						<p>Детское кресло</p>
						</div>
						<div>
							<a href="" class="btn mt-4">Заказать тариф</a>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center d-flex flex-column justify-content-between">
						<div>
							<h3 class="mb-lg-3 mb-2">Тариф "Деловой"</h3>
						<h4>от 22000 руб \ сутки *</h4>
						<p>Личный водитель</p>
						<p>Доставка автомобиля</p>
						</div>
						<div>
							<a href="/tarrifs" class="btn mt-4">Заказать тариф</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="row mt-4 mt-lg-5">
			<div class="col-12">
				<div class="text-center">
					<p class="small text-center">* Стоимость тарифа в сутки может отличаться в зависимости от выбранного автомобиля</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="text-center mt-1">
					<a href="/tarrifs" class="btn">Подробнее о тарифах</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10">
				<h2 class="section-title">Отзывы клиентов</h2>
			</div>
			<div class="col">
				<div class="slider_nav d-none d-lg-flex justify-content-end align-items-center">
					<div class="prev_btn prev_testi">
						<img src="./images/arrow-up-left.svg">
					</div>
					<div class="next_btn next_testi">
						<img src="./images/arrow-up-right.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="testimonials mt-1 mt-lg-5">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="./images/testi3.jpg" loading="lazy">
							<h3>Никита Ю.</h3>
							<p class="mb-0">Заказывали аренду автомобиля, помогли качественно с выбором, хорошая работа консультанта Ирины, помогла подобрать подходящий автомобиль и определиться с доп. опциями. </p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi2.webp" loading="lazy">
							<h3>Андрей Г.</h3>
							<p class="mb-0">Давно пользуюсь сервисом Cruton, радует, что техподдержка отзывчивая, помогает определиться с подходящим мне автомобилем, а так же помогли найти машиноместо в моём городе. Спасибо! </p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi1.jpg" loading="lazy">
							<h3>Юлия С.</h3>
							<p class="mb-0">Приезжали в Москву с семьёй на несколько дней, нужен был автомобиль с детским сидением. Сервис помог подобрать автомобиль(В моем случае это был Nissan Qashkai) и детское кресло к нему. Буду обращаться еще. </p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi4.jpg" loading="lazy">
							<h3>Борис В.</h3>
							<p class="mb-0">Нужен был небольшой автомобиль для перемещения по городу, команда Cruton подобрали мне необходимое авто в ближайшее время, сотрудник подвёз к указанному месту автомобиль быстро.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="section-title">Вопросы/ответы</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="faq_item">
					<div class="four">Какие преимущества имеет ваш сервис перед другими?</div>
					<p style="">Наш сервис имеет более 500 автомобилей по Москве, которые регулярно обслуживаются.</p>
				</div>
				<div class="faq_item">
					<div class="four">Почему стоит пользоваться Cruton, а не похожими сервисами?</div>
					<p style="">Мы стараемся предоставить услуги бизнес класса по доступным ценам. Наша поддержка поможет определиться с автомобилем, а так же подобрать дополнительные услуги в зависимости от ситуации. Работаем круглосуточно.</p>
				</div>
				<div class="faq_item">
					<div class="four">У меня нестандартный заказ, как мне понять, какой автомобиль и какие услуги мне нужны?</div>
					<p style="">К каждому клиенту мы находим индивидуальный подход, поэтому свяжитесь по горячей линии или оставьте заявку на сайте. Наш менеджер свяжется с вами.</p>
				</div>
				<div class="faq_item">
					<div class="four">Какая страховка предусматривается?</div>
					<p style="">К каждому автомобилю прикреплен полиск "Каско"</p>
				</div>
				<div class="faq_item">
					<div class="four">А как быть с платными парковками?</div>
					<p style="">Стоимость аренды автомобиля уже включает все платные парковки города, в т.ч и ТЦ</p>
				</div>
				<div class="faq_item">
					<div class="four">Что делать в случае ДТП?</div>
					<p style="">Все тоже самое, что и с личным авто. Техподдержка работает круглосуточно для консультации.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="section-title">Партнеры</h2>
			</div>
		</div>
		<div class="row gy-4 align-items-center mt-1 mt-lg-5">
			<div class="col-lg-3 col-sm-6">
				<div class="partner d-flex align-items-center justify-content-center">
					<img src="./images/ya.png">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="partner d-flex align-items-center justify-content-center">
					<img src="./images/sk.png">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="partner d-flex align-items-center justify-content-center">
					<img src="./images/mail.png">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="partner d-flex align-items-center justify-content-center">
					<img src="./images/rosavto.png">
				</div>
			</div>
		</div>
	</div>
</section>

		