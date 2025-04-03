
<div class="first_screen d-flex flex-column justify-content-center" style="background-image: url('./images/bg.jpg');">
	<div class="container">
		<div class="row ">
			<div class="col-lg-8">
				<div class="first_screen_wrap white">
					<h1 class="one">
						Самый натуральный мед - забота о здоровье!
					</h1>
					<p class="mt-4">Мы предоставляем только самый лучший и натуральный мед по все России!</p>
					<a href="#" data-toggle="modal" data-target="#Modal_register" class="btn mt-1">Заказать</a>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-10">
				<h2 class="section-title">Мед</h2>
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
							<div class="text"><?php echo $row['product_price'] ?> ₽</div>
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
				<h2 class="section-title">Продукты пчеловодства</h2>
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
							<div class="text"><?php echo $row['product_price'] ?> ₽</div>
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
				<h2 class="section-title">Подарочные наборы</h2>
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
							<div class="text"><?php echo $row['product_price'] ?> ₽</div>
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
				<h2 class="section-title">Наша команда</h2>
			</div>
		</div>
		<div class="row mt-lg-5 mt-1 gy-2 gy-lg-0">
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center">
						<div>
							<img src="./images/director.jpg" alt="">
							<p class="mb-lg-3">
								Генеральный директор
							</p>
							<h3 class="mb-lg-3 mb-2">Иванов Иван Максимович</h3>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center">
						<div>
							<img src="./images/worker2.jpg" alt="">
							<p class="mb-lg-3">
								Пчеловод
							</p>
							<h3 class="mb-lg-3 mb-2">Стотов Андрей Михайлович</h3>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tariff_wrap">
					<div class="tariff text-center">
						<div>
							<img src="./images/worker1.jpg" alt="">
							<p>Маточник</p>
							<h3 class="mb-lg-3 mb-2">Зайцев Степан Генадьевич</h3>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="container">
				<div class="text-center mt-1">
					<a href="information/about.php" class="btn">Подробнее о команде</a>
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
							<p class="mb-0">Заказывали липовый мед, остались очень довольны качеством продукта. Менеджер Анна подробно проконсультировала по сортам меда, помогла определиться с выбором и оформить доставку. </p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi2.webp" loading="lazy">
							<h3>Андрей Г.</h3>
							<p class="mb-0">Приобретали гречишный мед в этом магазине. Спасибо консультанту Елене за профессиональную помощь в выборе подходящего сорта и объяснение всех особенностей хранения меда. </p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi1.jpg" loading="lazy">
							<h3>Юлия С.</h3>
							<p class="mb-0">Заказывали набор разных видов меда. Оперативно получили подробную консультацию от специалиста Ольги по характеристикам каждого сорта и рекомендации по их применению.</p>
						</div>
						<div class="swiper-slide">
							<img src="./images/testi4.jpg" loading="lazy">
							<h3>Борис В.</h3>
							<p class="mb-0">Заказывали дягилевый мед впервые. Очень благодарны консультанту Наталье за подробное описание свойств этого сорта и рекомендации по его правильному использованию.</p>
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
					<div class="four">Как понять, что мед действительно натуральный?</div>
					<p style="">Натуральный мед имеет характерный вкус, аромат и цвет. Со временем он кристаллизуется. Мы предоставляем сертификаты качества на всю продукцию.</p>
				</div>
				<div class="faq_item">
					<div class="four">Мед свежий или долго хранится на складе?</div>
					<p style="">Мы работаем напрямую с пасечниками, поэтому мед всегда свежий и проходит строгий контроль качества.</p>
				</div>
				<div class="faq_item">
					<div class="four">Можно ли заказать мед в подарочной упаковке?</div>
					<p style="">Да, мы предлагаем мед в красивых подарочных банках или коробках, идеально подходящих для презента.</p>
				</div>
				<div class="faq_item">
					<div class="four">Доставляете ли вы мед в другие города?</div>
					<p style="">Да, мы доставляем мед по всей стране удобным для вас способом: курьером, почтой или через пункты выдачи.</p>
				</div>
				<div class="faq_item">
					<div class="four">Какие способы оплаты доступны?</div>
					<p style="">Вы можете оплатить заказ онлайн на сайте или при получении наличными/картой, в зависимости от выбранного способа доставки.</p>
				</div>
			</div>
		</div>
	</div>
</section>

		