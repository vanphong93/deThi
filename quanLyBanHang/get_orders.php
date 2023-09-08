<?php
include "connect.php";


if (isset($_POST["customer_id"])) {
    $selected_customer_id = $_POST["customer_id"];

    $orders_sql = "SELECT * FROM DONHANG WHERE MAKH = '$selected_customer_id'";
    $orders_result = $connect->query($orders_sql);

    if ($orders_result->num_rows > 0) {
        echo "<h3>Danh Sách Đơn Hàng Cho Khách Hàng</h3>";
        echo "<table border='1'>
                <tr>
                    <th>STT</th>
                    <th>Tên Đơn Hàng</th>

                </tr>";
        $stt = 1;
        while ($row = $orders_result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $stt . "</td>
                    <td>" . $row["TENDH"] . "</td>
                </tr>";
            $stt++;
        }

        echo "</table>";
    } else {
        echo "Không có đơn hàng nào cho khách hàng này.";
    }
}
$connect->close();
