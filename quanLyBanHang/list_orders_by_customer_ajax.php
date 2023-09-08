<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Đơn Hàng Theo Khách Hàng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Danh Sách Đơn Hàng Theo Khách Hàng</h2>

<?php
include "connect.php";

$customers_sql = "SELECT * FROM KHACHHANG";
$customers_result = $connect->query($customers_sql);
?>

<form action="list_orders_by_customer_ajax.php" method="post">
    Chọn khách hàng:
    <select name="customer_id" id="customerSelect">
        <option value="">Chọn khách hàng</option>
        <?php
        while ($customer_row = $customers_result->fetch_assoc()) {
            echo "<option value='".$customer_row["MAKH"]."'>".$customer_row["TENKH"]."</option>";
        }
        ?>
    </select>
</form>

<div class="ketqua"></div>

<script>
$(document).ready(function(){
    $('#customerSelect').change(function(){
        var customer_id = $(this).val();
        $.post("get_orders.php",
        { customer_id: customer_id },
           function(data,status){
                   if(status=="success")
                   {
                        $(".ketqua").html(data);
                    }
            });
    });
});
</script>

</body>
</html>
