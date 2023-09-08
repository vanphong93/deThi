<?php
include "connect.php";
if(isset($_POST["selected_date"])){
    $selected_date = $_POST["selected_date"];
    
    // Truy vấn danh sách đơn hàng theo ngày tháng
    $orders_sql = "SELECT * FROM DONHANG JOIN KHACHHANG ON DONHANG.MAKH=KHACHHANG.MAKH WHERE DATE(NGAYDAT) = '$selected_date'";
    $orders_result = $connect->query($orders_sql);

    if ($orders_result->num_rows > 0) {
        echo "<h3>Danh Sách Đơn Hàng Ngày $selected_date</h3>";
        echo "<table border='1'>
                <tr>
                <th>STT</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                </tr>";
$stt=1;
        while ($row = $orders_result->fetch_assoc()) {
            echo "<tr>
            <td>".$stt."</td>
                    <td>".$row["MADH"]."</td>
                    <td>".$row["TENKH"]."</td>
                </tr>";
                $stt++;
        }

        echo "</table>";
    } else {
        echo "Không có đơn hàng nào trong ngày $selected_date.";
    }
}
$connect->close();
?>
