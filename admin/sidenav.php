
  <nav id="sidebar" class='mx-lt-5 bg-primary' style="">
  <div class="container-fluid" style="padding: 0">
    
    <div class="sidebar-list">
            <a class="nav-item nav-home" href="index.php?page=home">
              <i class="fa fa-tachometer-alt"></i>
              Общая информация
            </a>
        
            
        
        
            <a class="nav-item nav-productlist" href="index.php?page=productlist">
              <i class="fa fa-list nav-productlist"></i>
              Каталог товаров, услуг
            </a>
            <a class="nav-item nav-orders" href="index.php?page=orders">
              <i class="fa fa-book"></i>
              Заказы
            </a>
            <a class="nav-item nav-maintenance" href="index.php?page=maintenance">
              <i class="fa fa-cogs nav-maintenance"></i>
              Настройки
            </a>
            
            <a class="nav-item nav-adduser nav-edituser nav-manageuser" href="index.php?page=manageuser" >
              <i class="fa fa-users"></i>
                Зарегистрированные пользователи
              </a>
            </div>
          
        
        
        
        
        
            
    </div>

  </div>
</nav>

<script>
  if('<?php echo isset($_GET['page']) ?>' == 1)
    $('.nav-<?php echo $_GET['page'] ?>').addClass('active')
</script>
    
    