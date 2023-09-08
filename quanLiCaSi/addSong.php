<!DOCTYPE html>
<html>

<head>
    <title>Thêm Bài Hát</title>
</head>

<body>
    <h2>Thêm Bài Hát</h2>
    <form method="POST" action="#">
        <label for="maBaiHat">Mã Bài Hát:</label>
        <input type="text" name="maBaiHat" required><br><br>
        <label for="tenBaiHat">Tên Bài Hát:</label>
        <input type="text" name="tenBaiHat" required><br><br>
        <label for="theLoai">Thể Loại:</label>
        <input type="text" name="theLoai" required><br><br>
        <input type="submit" value="Thêm">
    </form>
    <?php
    include "connect.php";
    // Xử lý khi nút "Thêm" được nhấn
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $maBaiHat = $_POST["maBaiHat"];
        $tenBaiHat = $_POST["tenBaiHat"];
        $theLoai = $_POST["theLoai"];

        // Insert dữ liệu vào bảng BAIHAT
        $sql = "INSERT INTO BAIHAT (MaBaiHat, TenBaiHat, TheLoai) VALUES ('$maBaiHat', '$tenBaiHat', '$theLoai')";

        if ($connect->query($sql) === TRUE) {
            echo "Bài hát đã được thêm thành công.";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $connect->error;
        }
    }

    $connect->close();
    ?>

</body>

</html>