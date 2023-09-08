<!DOCTYPE html>
<html>

<head>
    <title>Danh Sách Đơn Hàng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Danh Sách Đơn Hàng</h2>

    <div id="orderTable"></div>
    <script>
        $(document).ready(function() {
            loadOrderTable()
            $(document).on('click', '.delete-order-btn', function() {
                var order_id = $(this).val();
       
                $.post("delete_order.php", {
                        order_id: order_id
                    },
                    function(data, status) {
                        if (status == "success") {
                            loadOrderTable()
                        }
                    });
            });
            function loadOrderTable() {
                $.get("get_all_orders.php",function(data,status){
                    $('#orderTable').html(data);
            });
            }
        });
    </script>
</body>

</html>