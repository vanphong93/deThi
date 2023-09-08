<?php
include "connect.php";

$sql = "SELECT * FROM DONHANG";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Tên Đơn Hàng</th>
                <th>Ngày Đặt</th>
                <th>Mã Khách Hàng</th>
                <th>Thao Tác</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["MADH"]."</td>
                <td>".$row["TENDH"]."</td>
                <td>".$row["NGAYDAT"]."</td>
                <td>".$row["MAKH"]."</td>
                <td><button class='delete-order-btn' value='".$row["MADH"]."'>Xóa</button></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Không có đơn hàng nào.";
}

$connect->close();
?>
