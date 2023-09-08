<!DOCTYPE html>
<html>

<head>
    <title>Danh Sách Đơn Hàng Theo Ngày Tháng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Danh Sách Đơn Hàng Theo Ngày Tháng</h2>

    <form>
        Chọn ngày tháng: <input type="date" name="selected_date" id="dateInput">
    </form>

    <div id="orderTable"></div>

    <script>
        $(document).ready(function() {
            $('#dateInput').change(function() {
                var selected_date = $(this).val();

                if (selected_date !== '') {
                    $.post("get_orders_by_date_input.php", {
                        selected_date: selected_date
                    }, function(data) {
                        $('#orderTable').html(data)
                    })
                }
            });
        });
    </script>

</body>

</html>