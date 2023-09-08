<!DOCTYPE html>
<html>

<head>
    <title>Liệt Kê Thông Tin Hợp Đồng</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>Liệt Kê Thông Tin Hợp Đồng</h2>

    <!-- Combobox để chọn khách hàng -->
    <label for="khachHang">Chọn Khách Hàng:</label>
    <select id="khachHang">
        <option value="">Chọn Khách Hàng</option>
        <?php
        include "connect.php";
        // Lấy danh sách khách hàng từ bảng khachhang
        $sql = "SELECT MAKH, HOTEN FROM khachhang";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["MAKH"] . "'>" . $row["HOTEN"] . "</option>";
            }
        }

        $connect->close();
        ?>
    </select>

    <!-- Bảng để hiển thị thông tin hợp đồng -->
    <h3>Thông Tin Hợp Đồng</h3>
    <div id="hopDongTable"></div>

    <script>

        $(document).ready(function() {
            $('#khachHang').change(function() {
                var maKH = $(this).val();

                if (maKH !== '') {
                    $.post("gets_contracts.php", {
                        maKH: maKH
                    }, function(data) {
                        $('#hopDongTable').html(data)
                    })
                }
            });
        });
    </script>
</body>

</html>