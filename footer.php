<footer>
	<div class="container">
		<div class="row gy-4">
			<div class="col-lg-3">
				<a href="/" class="logo">
					<img src="../images/logo.png" alt="">
				</a>
				<div class="mt-4">
					<a href="tel:88009903124" class="tel">8 (800) 990-31-24</a>
					<p>Круглосуточно 24/7</p>
				</div>
			</div>
			<div class="col-lg-3">
				<h4>Автомобили</h4>
				<nav>
					<?php
					 include "db.php";
$category_query = "SELECT * FROM products WHERE product_cat = '6'";
$run_query = mysqli_query($con, $category_query);
if(mysqli_num_rows($run_query) > 0) {
    echo "<ul>";
    while($row = mysqli_fetch_array($run_query)) {
        echo "<li><a href='/product.php?p=".$row['product_id'] ."'>" . $row['product_title'] . "</a></li>";
    }
    echo "<li><a href='/store.php?filter=Автомобили' class='bold'>Все автомобили</a></li>";
    echo "</ul>";
} else {
    echo "No categories found"; // Выведем сообщение, если категорий нет
}

?>
				</nav>
			</div>
			<div class="col-lg-3">
				<h4>Услуги</h4>
				<nav>
				<?php 
$category_query = "SELECT * FROM products WHERE product_cat = '7'";
$run_query = mysqli_query($con, $category_query);
if(mysqli_num_rows($run_query) > 0) {
    echo "<ul>";
    while($row = mysqli_fetch_array($run_query)) {
        echo "<li><a href='/product.php?p=".$row['product_id'] ."'>" . $row['product_title'] . "</a></li>";
    }
    echo "<li><a href='/store.php?filter=Услуги' class='bold'>Все услуги</a></li>";
    echo "</ul>";
} else {
    echo "No categories found"; // Выведем сообщение, если категорий нет
}

?>
				</nav>
			</div>
			<div class="col-lg-3">
				<h4>Информация</h4>
				<nav>
					<ul>
						<li><a href="/information/faq.php">Вопросы и ответы</a></li>
						<li><a  href="/information/about.php">О компании</a></li>
						<li><a href="/information/tariffs.php">Тарифы</a></li>
						<li><a href="/information/contacts.php">Контакты</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-12">
				<p class="mb-0">© Cruton 2024</p>
			</div>
		</div>
	</div>
</footer>

	
