<?php
include "header.php";
?>


<section class="section">
<div class="container">	
    <div class="row">
			<div class="col-12">
				<h1>Мой профиль</h1>
				<?php 
												$user_id = $_SESSION["uid"];
												$result = mysqli_query($con, "SELECT * FROM user_info WHERE user_id = '$user_id'");
												

                        while($row=
                        mysqli_fetch_array($result))
                        {
                        ?>
                        
                          <div class="three mt-5">ФИО <?php echo ucwords($row['first_name'].' '.$row['last_name']) ?></td>
                          <div class="three mt-3">E-mail: <?php echo $row['email'] ?></div>
													<div class="three mt-3">Телефон: <?php echo $row['mobile'] ?></div>
													<div class="three mt-3">Город: <?php echo $row['address1'] ?></div>
													<div class="three mt-3">Адрес: <?php echo $row['address2'] ?></div>
                        <?php
                        }
                        mysqli_close($con);
                        ?>
			</div>
		</div>
</div>
</section>	
<?php
include "footer.php";
?>