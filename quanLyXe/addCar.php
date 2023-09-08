<!DOCTYPE html>
<html>

<head>
    <title>Thêm Xe</title>
</head>

<body>
    <h2>Thêm Xe</h2>
    <form method="get" action="#">
        <label for="maXe">Mã Xe</label>
        <input type="text" name="maXe" required><br><br>

        <label for="tenXe">Tên Xe</label>
        <input type="text" name="tenXe" required><br><br>

        <label for="mauXe">Màu xe:</label>
        <input type="text" name="mauXe" required><br><br>

        <label for="soChoNgoi">Số chỗ ngồi</label>
        <input type="text" name="soChoNgoi" required><br><br>
        <label for="tenHang">Tên hãng</label>
        <input type="text" name="tenHang" required><br><br>
        <input type="Submit" name="Submit" value="Thêm">

    </form>
    <?php
    include "connect.php";
    if (isset($_GET['Submit']) && ($_GET['Submit'] == 'Thêm')) {
        $maXe = $_GET['maXe'];
        $tenXe = $_GET['tenXe'];
        $mauXe = $_GET['mauXe'];
        $soChoNgoi = $_GET['soChoNgoi'];
        $tenHang = $_GET['tenHang'];

        $sql = "INSERT INTO XE  VALUES ('$maXe', '$tenXe', '$mauXe','$soChoNgoi','$tenHang')";

        if ($connect->query($sql) === TRUE) {
            echo "Thêm Xe thành công!";
        } else {
            echo "Lỗi: " . $connect->error;
        }
    }
    $connect->close();
    ?>
</body>

</html>