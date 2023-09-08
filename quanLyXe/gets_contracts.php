<?php
     include "connect.php";
// Xử lý yêu cầu Ajax
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['maKH'])) {
    $maKH = $_POST['maKH'];
    
    // Truy vấn dữ liệu hợp đồng cho khách hàng cụ thể
    $sql = "SELECT * FROM hopdong WHERE MAKH = '$maKH'";
    $result = $connect->query($sql);

    // $contracts = array();
    // while ($row = $result->fetch_assoc()) {
    //     $contracts[] = $row;
    // }

    // echo json_encode($contracts);
    if ($result->num_rows > 0) {
        echo "<h3>Danh Sách Đơn Hàng Ngày $</h3>";
        echo "<table border='1'>
                <tr>
          
                    <th>Mã Hợp Đồng</th>
                    <th>Tên Hợp Đồng</th>
                    <th>Tổng Số Tiền</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
 
                    <td>".$row["MAHD"]."</td>
                    <td>".$row["TENHD"]."</td>
                    <td>".$row["TONGTIEN"]."</td>
                </tr>";
       
        }

        echo "</table>";
    } else {
        echo "Không có ";
    }
}

$connect->close();
