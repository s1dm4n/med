 <?php
include("../db.php");
 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Товары</h4>
                
              </div>
              <div class="card-body">
                <div class="col-md-2 offset-md-10"> <a class=" btn btn-primary " href="index.php?page=addproduct">Добавить позицию</a></div> 
                <br>
                <div class="table-responsive ps">
                  <table class="table table-striped " id="prod">
                    <thead class="">
                      <tr>
                        <th>Картинка</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Выберите действие</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"SELECT product_id,product_image, product_title,product_price from products    order by product_title asc");

                        while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td><img src='../product_images/$image' style='width:50px; height:50px;'></td><td>$product_name</td>
                        <td>$price</td>
                        <td>
                        <a class=' btn btn-primary btn-sm' href='index.php?page=addproduct&id=$product_id'>Изменить</a>
                        <a class=' btn btn-danger btn-sm remove_product' href='javascript:void(0)' data-id ='$product_id'>Удалить</a>
                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            
           

          </div>
          
          
        </div>
      </div>

      <script>
        // $('#prod').dataTable() здесь используется библиотека, которая позволяет включать навигацю и поиск по товарам на стороне клиента
				$('.remove_product').click(function(){

var conf = confirm('Вы уверены? Товар удалиться навсегда!');
if(conf == true){
$.ajax({
	url:'remove_product.php?id='+$(this).attr('data-id'),
	success:function(resp){
		if(resp == 1){
			alert('Товар удален.')
			location.reload()
			//Перезагрузка после удаления
		} else {
			alert('Ошибка удаления товара')
		}
	}
})	
}


})
      </script>