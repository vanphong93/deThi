<?php
include "connect.php";

// Truy vấn dữ liệu từ bảng xe
$sql = "SELECT MAXE, TENXE, MAUXE, SOCHO, TENHANG FROM xe";
$result = $connect->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Danh Sách Xe</title>
</head>

<body>
    <h2>Danh Sách Xe</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Mã Xe</th>
                <th>Tên Xe</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["MAXE"] . "</td>";
                    echo "<td>" . $row["TENXE"] . "</td>";
                    echo "<td><a href='#' onclick='viewDetail(\"" . $row["MAXE"] . "\", \"" . $row["TENXE"] . "\", \"" . $row["MAUXE"] . "\", \"" . $row["SOCHO"] . "\", \"" . $row["TENHANG"] . "\")'>View</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <h3>Thông Tin Xe</h3>
    <div id="detail">
        <label >Mã Xe</label>
        <input type="text" id="maXe"  ><br><br>
        <label >Tên Xe</label>
        <input type="text" id="tenXe" ><br><br>
        <label >Màu Xe</label>
        <input type="text" id="mauXe" ><br><br>
        <label >Số Chỗ</label>
        <input type="text" id="soCho"  ><br><br>
        <label >Hãng Sản Xuất</label>
        <input type="text" id="tenHang" ><br><br>
    </div>

    <script>
        function viewDetail(maXe, tenXe, mauXe, soCho, tenHang) {
            document.getElementById("maXe").value = maXe;
            document.getElementById("tenXe").value = tenXe;
            document.getElementById("mauXe").value = mauXe;
            document.getElementById("soCho").value = soCho;
            document.getElementById("tenHang").value = tenHang;

            // Hiển thị thông tin chi tiết của xe
            document.getElementById("detail").style.display = "block";
        }
    </script>
</body>

</html>