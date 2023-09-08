<!DOCTYPE html>
<html>

<head>
    <title>Tìm Học Sinh Theo Tên</title>
</head>

<body>
    <h2>Tìm Học Sinh Theo Tên</h2>

    <form method="post" action="#">
        <label for="ten-hs">Tên cần tìm :</label>
        <input type="text" id="ten-hs" name="ten-hs" required>
        <input type="submit" name="submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $tenHocSinh = $_POST['ten-hs'];

        // Kết nối đến cơ sở dữ liệu
        include "connect.php";

        // Truy vấn học sinh theo tên
        $sql = "SELECT MAHS, TENHS FROM HOCSINH WHERE TENHS LIKE '%$tenHocSinh%'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>Tìm thấy học sinh $tenHocSinh</p>";
        } else {
            echo "<p>Không tìm thấy học sinh $tenHocSinh</p>";
        }

        $connect->close();
    }
    ?>

</body>

</html>