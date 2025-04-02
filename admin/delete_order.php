<?php
include("../db.php");

if(isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Удаление заказа из таблицы orders_info
    $delete_query = mysqli_query($con, "DELETE FROM orders_info WHERE order_id = '$order_id'");
    if($delete_query) {
        echo "success"; // Вернуть "success" в случае успешного удаления
    } else {
        echo "error"; // Вернуть "error" в случае ошибки удаления
    }
}
?>