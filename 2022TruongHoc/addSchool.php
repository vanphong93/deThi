<!DOCTYPE html>
<html>

<head>
    <title>Thêm Trường Học</title>
</head>

<body>
    <h2>Thêm Trường Học</h2>
    <form method="get" action="#">
        <label for="matruong">Mã Trường:</label>
        <input type="text"  name="matruong" required><br><br>

        <label for="tentruong">Tên Trường:</label>
        <input type="text"  name="tentruong" required><br><br>

        <label for="diachi">Địa Chỉ:</label>
        <input type="text"  name="diachi" required><br><br>

        <input type="Submit" name="Submit" value="Thêm">
        <input type="reset" value="Reset">
    </form>
    <?php
    include "connect.php";
    if (isset($_GET['Submit'])&&($_GET['Submit']=='Thêm')) {
        $matruong = $_GET['matruong'];
        $tentruong = $_GET['tentruong'];
        $diachi = $_GET['diachi'];
        $sql = "INSERT INTO TRUONG  VALUES ('$matruong', '$tentruong', '$diachi')";

        if ($connect->query($sql) === TRUE) {
            echo "Thêm trường học thành công!";
        } else {
            echo "Lỗi: " . $connect->error;
        }
    }
    $connect->close();
    ?>
</body>

</html>