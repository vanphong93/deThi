<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm Khách Hàng</title>
</head>

<body>

    <form action="#" method="get">
        Mã Khách Hàng: <input type="text" name="MAKH"><br><br>
        Tên Khách Hàng: <input type="text" name="TENKH"><br><br>
        Địa Chỉ: <input type="text" name="DIACHI"><br><br>
        <input type="Submit" value="Thêm" name="Submit">
    </form>
    <?php
    include "connect.php";
    if (isset($_GET['Submit']) && ($_GET['Submit'] == 'Thêm')) {
        $MAKH = $_GET['MAKH'];
        $TENKH = $_GET['TENKH'];
        $DIACHI = $_GET['DIACHI'];
        $str = "insert into KHACHHANG values('$MAKH','$TENKH','$DIACHI')";
        if ($connect->query($str) == true)
            echo "Thêm khách hàng thành công";
        else
            echo "Thêm khách hàng không thành công";
        $connect->close();
    }
    ?>
    <br>
    <a href="index.php">Home</a>
</body>

</html>