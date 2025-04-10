  <?php
include '../db.php';
include "sidenav.php"; //Подключение бокового меню
include "topheader.php"; //Подключение дополнительного  текста
//который отвечает за админ-панель

if(isset($_GET['id'])){

  $qry = mysqli_query($con,"SELECT * FROM products where product_id = ".$_GET['id']);
  foreach(mysqli_fetch_array($qry) as $key => $val){
    $meta[$key] = $val;
  }
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" id="manage-prod">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Добавить позицию</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Название</label>
                        <input type="hidden"  name="product_id" class="form-control" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <input type="text" id="product_name" required name="product_name" class="form-control" value="<?php echo isset($meta['product_title']) ? $meta['product_title'] : '' ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <img src="../product_images/<?php echo isset($meta['product_image']) ? $meta['product_image'] : '' ?>" alt="" class="img-field" width="75" height="100">

                        <label for="">Картинка</label>
                        <input type="file" name="picture" accept="image/png, image/gif, image/jpeg" <?php echo !isset($meta['product_image']) ? 'required' : '' ?> class="btn btn-fill" id="picture" onchange="displayImg(this,$(this))">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Описание</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"><?php echo isset($meta['product_desc']) ? $meta['product_desc'] : '' ?></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Цена</label>
                        <input type="text" id="price" name="price" value="<?php echo isset($meta['product_price']) ? $meta['product_price'] : '' ?>" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Категории</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Категория позиции</label>
                        <select name="category_id" id="category_id" class="default-browser custom-select select2">
                          <option value=""></option>
                          <?php 
                          $cat = mysqli_query($con,"select * from categories");
                          while($row = mysqli_fetch_assoc($cat)):
                          ?>
                            <option value="<?php echo $row['cat_id'] ?>" <?php echo isset($meta['product_cat']) && $meta['product_cat'] == $row['cat_id'] ?  'selected' : '' ?>><?php echo $row['cat_title'] ?></option>
                        <?php endwhile; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Дополнительная категория</label>
                        <select name="brand_id" id="brand_id" class="default-browser custom-select select2">
                          <option value=""></option>
                          <?php 
                          $cat = mysqli_query($con,"select * from brands");
                          while($row = mysqli_fetch_assoc($cat)):
                          ?>
                            <option value="<?php echo $row['brand_id'] ?>" <?php echo isset($meta['product_brand']) && $meta['product_brand'] == $row['brand_id'] ?  'selected' : '' ?>><?php echo $row['brand_title'] ?></option>
                        <?php endwhile; ?>
                        </select>
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ключевое слово</label>
                        <input type="text" id="tags" name="tags" required class="form-control" value="<?php echo isset($meta['product_keywords']) ? $meta['product_keywords'] : '' ?>">
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Обновить товар</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
     <script>

       $('#manage-prod').submit(function(e){
        e.preventDefault()
        
        $.ajax({
          url:'./save_prod.php',
          data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', 
            error:err=>console.log(err),
            success:function(resp){
              if(resp == 1){
                  alert("Товар успешно добавлен.");
                  location.replace('index.php?page=productlist')
              } else {
								alert('Произошла ошибка при добавлении товара')
								location.replace('index.php?page=addproduct')
							}
            }
        })
       })
       function displayImg(input,_this) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                _this.parent().parent().parent().find('.img-field').attr('src', e.target.result);
                  _this.siblings('label').html(input.files[0]['name'])
                  _this.siblings('input[name="fname"]').val('<?php echo strtotime(date('y-m-d H:i:s')) ?>_'+input.files[0]['name'])
                  var p = $('<p></p>')
                  
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
     </script>