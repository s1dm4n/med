<?php
include 'header.php';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                // Получаем список основных категорий
                $categories = [6 => "Мед", 8 => "Продукты пчеловодства", 7 => "Подарочные наборы"];
                
                foreach($categories as $cat_id => $cat_name) {
                    // Получаем товары для каждой категории
                    $sql = "SELECT * FROM products WHERE product_cat = '$cat_id'";
                    $run_query = mysqli_query($con, $sql);
                    
                    if(mysqli_num_rows($run_query) > 0) {
                        echo "<div class='category-section mb-5'>";
                        echo "<h2 class='section-title'>$cat_name</h2>";
                        echo '<div class="row gy-4">';
                        
                        while($row = mysqli_fetch_array($run_query)) {
                            $pro_id = $row['product_id'];
                            $pro_title = $row['product_title'];
                            $pro_price = $row['product_price'];
                            $pro_image = $row['product_image'];
                            
                            echo "
                                <div class='col-md-4'>
                                    <a href='product.php?p=$pro_id'>
                                        <div class='product_item'>
                                            <img src='product_images/$pro_image' alt=''>
                                            <h5 class='mt-3'>$pro_title</h5>
                                            <div class='text'>$pro_price ₽</div>
                                            <div class='add-to-cart mt-3'>
                                                <button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist btn' href='#'>
                                                    <i class='fa fa-shopping-cart'></i>В корзину
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            ";
                        }
                        
                        echo '</div></div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<style>
.section-title {
	margin-bottom: 78px;
}

.section-title {
    margin-bottom: 78px;
}

.product_item {
    transition: transform 0.3s ease;
    cursor: pointer;
}

.product_item:hover {
    transform: scale(1.05);
}

a {
    text-decoration: none;
    color: var(--text);
}

.product_item .text {
    pointer-events: none;
    color: var(--text);
}

a:hover {
	color: var(--text);
}

.product_item button {
    pointer-events: auto;
}

.category-section {
	margin-bottom: 128px !important;
}

.product_item {
    transition: transform 0.3s ease;
    cursor: pointer;
    background-color:rgb(255, 255, 255);
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(2,2,0,0.05);
}

.product_item img {
    border-radius: 10px;
}

.category-section .row {
    margin: -2rem;  /* Компенсация внешних отступов */
}

.category-section .row > [class*='col-'] {
    padding: 1.2rem;  /* Увеличенный отступ для колонок */
}

.category-section .product_item {
    transition: transform 0.3s ease;
    cursor: pointer;
    background-color: rgb(255, 255, 255);
    border-radius: 15px;
    padding: 24px;
    box-shadow: 0 2px 4px rgba(2,2,0,0.05);
    height: 100%;
}

.category-section .product_item img {
    border-radius: 10px;
    width: 100%;
}

.category-section .col-md-4 {
	margin-top: 0;
}
</style>

<?php
include "footer.php";
?>