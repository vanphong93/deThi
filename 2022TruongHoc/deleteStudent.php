<!DOCTYPE html>
<html>
<head>
    <title>Xóa Học Sinh</title>
</head>
<body>
    <h2>Xóa Học Sinh</h2>
    <form method="POST" action="#">
        Nhập Mã Số Học Sinh: <input type="text" name="ma-hs">
        <input type="submit" value="Xóa">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $maHS = $_POST['ma-hs'];

        include "connect.php";
        // Kiểm tra xem học sinh có tồn tại không
        $kiemTraSql = "SELECT * FROM HOCSINH WHERE MAHS = '$maHS'";
        $kiemTraResult = $connect->query($kiemTraSql);

        if ($kiemTraResult->num_rows == 0) {
            echo "Không tìm thấy học sinh có mã số: $maHS";
        } else {
            // Nếu học sinh tồn tại, thực hiện xóa
            $xoaSql = "DELETE FROM HOCSINH WHERE MAHS = '$maHS'";
            if ($connect->query($xoaSql) === TRUE) {
                echo "Xóa thành công học sinh có mã số: $maHS";
            } else {
                echo "Lỗi xóa học sinh: " . $connect->error;
            }
        }

        $connect->close();
    }
    ?>
</body>
</html>
