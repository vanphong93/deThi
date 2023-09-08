<!DOCTYPE html>
<html>

<head>
    <title>Thêm Lớp</title>
</head>

<body>
    <h2>Thêm Lớp</h2>
    <form method="post" action="#">
        <label for="matruong">Trường Học:</label>
        <select id="matruong" name="matruong" required>
            <option value="">Chọn Trường Học</option>
            <?php
            include "connect.php";
            // Lấy danh sách các trường học từ bảng TRUONG
            $sql = "SELECT MATRUONG, TENTRUONG FROM TRUONG";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['MATRUONG'] . "'>" . $row['TENTRUONG'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="malop">Mã Lớp:</label>
        <input type="text" id="malop" name="malop"required><br><br>

        <label for="tenlop">Tên Lớp:</label>
        <input type="text" id="tenlop" name="tenlop" required><br><br>

        <input type="submit" name="add" value="Thêm">

    </form>
    <?php
    // Xử lý khi người dùng nhấn nút "Thêm"
    if (isset($_POST['add'])) {
        $matruong = $_POST['matruong'];
        $tenlop = $_POST['tenlop'];
        $malop = $_POST['malop'];

        // Câu lệnh SQL để thêm lớp
        $sql = "INSERT INTO LOP (MALOP, TENLOP, MATRUONG) VALUES ('$malop', '$tenlop', '$matruong')";

        if ($connect->query($sql) === TRUE) {
            echo "Thêm lớp thành công!";
            // Xóa dữ liệu trong các ô input sau khi thêm thành công
            $_POST['matruong'] = $_POST['malop'] = $_POST['tenlop'] = '';
        } else {
            echo "Lỗi: " . $connect->error;
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $connect->close();
    ?>
</body>

</html>