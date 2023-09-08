<!DOCTYPE html>
<html>

<head>
    <title>Tạo Hợp Đồng</title>
</head>

<body>
    <h2>Tạo Hợp Đồng</h2>
    <form method="POST" action="#">
        <label for="maKH">Chọn Mã Khách Hàng:</label>
        <select name="maKH" required>
            <?php
            include "connect.php";
            // Lấy danh sách mã khách hàng từ bảng khachhang
            $sql = "SELECT MAKH, HOTEN FROM khachhang";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["MAKH"] . "'>" . $row["MAKH"] . "</option>";
                }
            }
            ?>
        </select><br><br>
        <label for="maHD">Mã Hợp Đồng:</label>
        <input type="text" name="maHD" required><br><br>
        <label for="tenHD">Tên Hợp Đồng:</label>
        <input type="text" name="tenHD" required><br><br>
        <label for="tongTien">Tổng Tiền:</label>
        <input type="number" name="tongTien" required><br><br>
        <input type="submit" value="Thêm">
    </form>
    <?php
    // Xử lý khi nút "Thêm" được nhấn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $maHD = $_POST["maHD"];
        $tenHD = $_POST["tenHD"];
        $tongTien = $_POST["tongTien"];
        $maKH = $_POST["maKH"];
        $ngayLap = date("Y-m-d H:i:s");
        // Insert dữ liệu vào bảng hopdong
        $sql = "INSERT INTO hopdong (MAHD, TENHD, NGAYLAP, TONGTIEN, MAKH) VALUES ('$maHD', '$tenHD', '$ngayLap', $tongTien, '$maKH')";

        if ($connect->query($sql) === TRUE) {
            echo "Hợp đồng đã được thêm thành công.";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $connect->error;
        }
    }

    $connect->close();

    ?>
</body>

</html>