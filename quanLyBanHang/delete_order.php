<?php
include "connect.php";

if(isset($_POST["order_id"])){
    $order_id = $_POST["order_id"];
    
    // Xóa đơn hàng dựa trên order_id
    $delete_sql = "DELETE FROM DONHANG WHERE MADH = '$order_id'";
    // $delete_sql=true;
    $delete_result = $connect->query($delete_sql);
}

$connect->close();
?>
