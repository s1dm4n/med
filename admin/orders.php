

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Заказы </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover table-striped " id="ordertbl">
                    <thead class="">
                      <tr>
                        <th>№</th>
                        <th>Заказ</th>
                        <th>Информация</th>
                        <th>Статус</th>
                        <th>Действие</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from orders_info o inner join orders_info oi on oi.order_id= o.order_id ")or die ("query 1 incorrect.....");

                        while($row=mysqli_fetch_array($result))
                        {	
                        // echo "<tr><td>$cus_name</td><td>$p_names</td><td>$email<br>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$country</td><td>$details</td><td>$quantity</td><td>$time</td>

                        // <td>
                        // <a class=' btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                        // </td></tr>";
                          $prod = mysqli_query($con,"SELECT * FROM order_products op inner join products p on op.product_id = p.product_id where op.order_id = ".$row['order_id']);
                        ?>
                        <tr>
                          <td><?php echo $row['order_id'] ?></td>
                          <td>
                              <a data-toggle="collapse" href="#prod<?php echo $row['order_id'] ?>" role="button" aria-expanded="false" aria-controls="prod<?php echo $row['order_id'] ?>">Детали заказа <span><i class="fa fa-angle-down"></i></span></a>
                             <div class="collapse" id="prod<?php echo $row['order_id'] ?>">
                            <?php
                            while($prow = mysqli_fetch_assoc($prod)){

                             ?>
                             <small>
                             <p><b>Товар:</b><?php echo $prow['product_title']  ?></p>
                             <p><b>Цена:</b><?php echo $prow['product_price']  ?></p>
                             <p><b>Количество:</b><?php echo $prow['qty']  ?></p>
                             <p><b>Итого:</b><?php echo $prow['amt'] ?></p>
                             </small>
                             <hr>
                            <?php } ?>
                          </div>
                          </td>
                          <td>
                            <p><b>Имя :</b><?php echo ucwords($row['f_name']) ?></p>
                            <p><b>Адрес :</b><?php echo $row['address'] ?></p>
                            <p><b>Email :</b><?php echo $row['email'] ?></p>
                            
                          </td>
                         <td>
												 <div class="badge badge-success">Оформлен</div>
</td>
<td>
<div class="btn btn-danger btn-sm delete-order" style="cursor: pointer;" data-order-id="<?php echo $row['order_id'] ?>">Удалить заказ</div>
</td>
                          <!--  </td>
													
                          <td>
                             
                               <?php if($row['status'] == 1): ?>
                                <button class="btn btn-sm btn-primary changestatus" data-stat ='2' data-id="<?php echo $row['order_id'] ?>">Доставлен</button>
                              <?php elseif($row['status'] == 2): ?>
                                <button class="btn btn-sm btn-primary changestatus" data-stat ='3' data-id="<?php echo $row['order_id'] ?>">Доставлен</button>
                              <?php elseif($row['status'] == 3): ?>
                                <div class="badge badge-success" data-id="<?php echo $row['order_id'] ?>" disabled>Отправлен</div>
                              <?php endif; ?>
                          </td> -->
                        </tr>
                        <?php
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
        // $('#ordertbl').dataTable()

				$('.delete-order').click(function(){
        var order_id = $(this).data('order-id');
        var confirmation = confirm("Вы уверены, что хотите удалить этот заказ?");
        
        if(confirmation) {
            $.ajax({
                url: 'delete_order.php',
                type: 'POST',
                data: { order_id: order_id },
                success: function(response) {
                    if(response == "success") {
                        alert("Заказ успешно удален.");
                        location.reload(); // Перезагрузить страницу после удаления заказа
                    } else {
                        alert("Ошибка при удалении заказа.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Ошибка при выполнении запроса.");
                }
            });
        }
    });
        $('.changestatus').click(function(){
          var conf = confirm("Are you sure change the status of this order?");
          if(conf == true){
            start_load()
            $.ajax({
              url:'orederstatsupdate.php',
              method:"POST",
              data:{status:$(this).attr('data-stat'),id:$(this).attr('data-id')},
              error:err=>console.log(err),
              success:function(resp){
                if(resp == 1){
                  alert("Order updated successfully.");
                  location.reload();
                }
              }
            })
          }
        })
      </script>