<?php
include "header.php";
?>
<div class="page_content single_product">
	<div class="container">
		<?php
		include 'db.php';
		$product_id = $_GET['p'];

		$sql = "SELECT * FROM products WHERE product_id = $product_id";
		if (!$con) {
			die ("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="row">
					<div class="col">
						<h2 class="section-title">
							<?= $row['product_title']; ?>
						</h2>
						<p>
							<?= $row['product_desc'] ?>
						</p>
						<?php
						// Здесь я вывожу единицу измерения позиции в зависимости от категории, 
						if ($row['product_keywords'] == "Автомобили") {
							// Если ключевые слова равны "Автомобили", то выводим цену за сутки
							echo "<h4>от " . $row['product_price'] . "₽ / сутки</h4>";
						} elseif ($row['product_keywords'] == "Товары") {
							echo "<h4>" . $row['product_price'] . "₽ / за шт.</h4>";
						} elseif ($row['product_keywords'] == "Услуги") {
							echo "<h4>от " . $row['product_price'] . "₽ / за услугу.</h4>";
						}
						// Здесь я вывожу единицу измерения позиции в зависимости от категории, на кнопке "Заказать" тоже можно учесть такой функционал
						?>
						
						<button class="btn mt-3" pid="<?= $row['product_id'] ?>" id="product">Заказать</button>
					</div>
					<div class="col">
						<img src="product_images/<?= $row['product_image']; ?>">
					</div>
					<?php
					$_SESSION['product_id'] = $row['product_id'];
					?>
				</div>
			<?php
			}
		}
		?>

	</div>
</div>


<?php
include "footer.php";

?>