<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<h2>Top 10 Mặt Hàng Bán Chạy Nhất</h2>

<?php
include "connect.php";
$sql = "SELECT HANGHOA.TENHH, SUM(CHITIETDONHANG.SOLUONG) AS TONGSOLUONG
        FROM HANGHOA
        JOIN CHITIETDONHANG ON HANGHOA.MAHH = CHITIETDONHANG.MAHH
        GROUP BY HANGHOA.MAHH
        ORDER BY TONGSOLUONG DESC
        LIMIT 10";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Mặt Hàng</th>
                <th>Tổng Số Lượng Bán</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["TENHH"]."</td>
                <td>".$row["TONGSOLUONG"]."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

$connect->close();
?>
 <a href="index.php">Home</a>
</body>
</html>
