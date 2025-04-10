<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
// if(isset($_POST["category"])){
// 	$category_query = "SELECT * FROM categories";
// 	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
// 	echo "<div class='aside'>
// 							<h3 class='aside-title'>Категории</h3>
// 							<div class='btn-group-vertical'>";
// 	if(mysqli_num_rows($run_query) > 0){
// 			while($cat_row = mysqli_fetch_array($run_query)){
// 					$cid = $cat_row["cat_id"];
// 					$cat_name = $cat_row["cat_title"];
// 					$sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$cid";
// 					$query = mysqli_query($con, $sql);
// 					$row = mysqli_fetch_array($query);
// 					$count = $row["count_items"];
// 					echo "<div type='button' class='btn navbar-btn category' cid='$cid'>
// 									<a href='#'>
// 											<span></span>
// 											$cat_name
// 											<small class='qty'>($count)</small>
// 									</a>
// 							</div>";
// 			}
// 			echo "</div>";
// 	}
// }


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;

	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$search = isset($_POST['search']) ? $_POST['search'] :'';
	$swhere = '';
	if(!empty($search)){
		$swhere  = " and ( product_keywords LIKE '%".$search."%' or cat_title like '%".$search."%' or brand_title like '%".$search."%' or product_title like '%".$search."%' ) ";
	}
	
	$product_query = "SELECT * FROM products,categories,brands WHERE product_cat=cat_id and  brand_id = product_brand ".$swhere." LIMIT $start,$limit";
	// echo $product_query;
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		echo '<div class="row gy-4">';
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
			echo "
				
                        

							 <div class='col-md-4'>
							 <a href='product.php?p=$pro_id'>
							 <div class='product_item'>
							 	<img src='product_images/$pro_image' alt=''>
								<h5 class='mt-3'>$pro_title</h5>
								<div class='text'>$pro_price ₽</div>

								 <div class='add-to-cart mt-3'>
									 <button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist btn' href='#'><i class='fa fa-shopping-cart'></i>В корзину</button>
								 </div>
							 </div>
							 </a>
						 </div>

                        
			";
		}
		echo '</div>';
	}
	exit;
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
    if(isset($_POST["get_seleted_Category"])){
        $id = $_POST["cat_id"];
        
        // Получаем название категории
        $cat_query = "SELECT cat_title FROM categories WHERE cat_id = '$id'";
        $cat_result = mysqli_query($con, $cat_query);
        $cat_row = mysqli_fetch_array($cat_result);
        $category_name = $cat_row['cat_title'];
        
        // Выводим заголовок категории
        echo "<h2 class='section-title text-center mb-4'>$category_name</h2>";
        echo '<div class="row gy-4">';
        
        // Получаем товары категории
        $sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
        $run_query = mysqli_query($con,$sql);
        
        while($row=mysqli_fetch_array($run_query)){
            $pro_id    = $row['product_id'];
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
        echo '</div>';
    }
}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Позиция добавлена в корзину!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Позиция добавлена в корзину!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Позиция добавлена в корзину!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Позиция добавлена в корзину!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty,a.product_desc FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty,a.product_desc FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price=$total_price+$product_price;
				echo '
					
                    
                    <div class="product-widget">
												<div class="product-img">
													<img src="product_images/'.$product_image.'" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
													<h4 class="product-price"><span class="qty">'.$n.'</span>$'.$product_price.'</h4>
												</div>
												
											</div>'
                    
                    
                    ;
				
			}
            
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) selected</small>
				    <h5>$'.$total_price.'</h5>
				</div>'
            ?>
				
				
			<?php
			
			exit();
		} 
	}
	
    
    
    if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			
			echo '<div class="main ">
			<div class="table-responsive">
			<form method="post" action="login_form.php">
			
	               <table id="cart" class="table table-hover table-condensed" id="">
    				<thead>
						<tr>
							<th style="width:50%">Товар\Услуга</th>
							<th style="width:10%">Цена</th>
							<th style="width:8%">Количество</th>
							<th style="width:7%" class="text-center">Цена</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
                    ';
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'
                             
						<tr>
							<td data-th="Product" >
								<div class="row">
								
									<div class="col-sm-4 "><img src="product_images/'.$product_image.'" style="height: 70px;width:75px;"/>
									<h4 class="nomargin product-name header-cart-item-name"><a href="product.php?p='.$product_id.'">'.$product_title.'</a></h4>
									</div>
									<div class="col-sm-6">
										<div style="">
										<p class="item_desc">'.$row['product_desc'].'</p>
										</div>
									</div>
									
									
								</div>
							</td>
                            <input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td data-th="Цена"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></td>
							<td data-th="Количество">
								<input type="text" class="form-control qty" value="'.$qty.'" >
							</td>
							<td data-th="Итого за позицию" class="text-center"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></td>
							<td class="actions" data-th="">
							<div class="btn-group">
								<a href="#" class="btn btn-info btn-sm update" update_id="'.$product_id.'">Обновить</a>
								
								<a href="#" class="btn btn-danger btn-sm remove" remove_id="'.$product_id.'">Удалить</a>		
							</div>							
							</td>
						</tr>
					
                            
                            ';
				}
				
				echo '</tbody>
				<tfoot>
					
					<tr>
						<td><a href="store.php" class="btn"><i class="fa fa-angle-left"></i> Продолжить покупки</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center" ><b class="net_total" ></b></td>
						<div id="issessionset"></div>
                        <td>
							
							';
							//Если пользователь не зареган, то сначала обработчик предложит ему пройти регистрацию
				if (!isset($_SESSION["uid"])) {
					echo '
					
							<a href="" data-toggle="modal" data-target="#Modal_register" class="btn">Войти и оформить заказ</a></td>
								</tr>
							</tfoot>
				
							</table></div></div>';
                }else if(isset($_SESSION["uid"])){
					echo '
					</form>
					
						<form action="checkout.php" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@puneeth.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	

									'<input type="hidden" name="total_count" value="'.$x.'">
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn" value="Оформить заказ">
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table></div></div>    
								';
				}
			} else {
				echo '<div class="three">Корзина пуста</div>';
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Товар удален из корзины</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Товар обновлен</b>
				</div>";
		exit();
	}
}




?>






