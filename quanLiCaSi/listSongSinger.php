<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>Liệt Kê Ca Sĩ Hát Bài Hát</title>
</head>

<body>
    <h2>Liệt Kê Ca Sĩ Hát Bài Hát</h2>
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Ca Sĩ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connect.php";
            // Truy vấn dữ liệu từ bảng CASI và BAIHAT
            $sql = "SELECT CASI.TenCaSi
                        FROM CASI
                        INNER JOIN CASI_BAIHAT ON CASI.MaCaSi = CASI_BAIHAT.MaCaSi
                        INNER JOIN BAIHAT ON CASI_BAIHAT.MaBaiHat = BAIHAT.MaBaiHat";

            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $stt . "</td>";
                    echo "<td>" . $row["TenCaSi"] . "</td>";
                    echo "</tr>";
                    $stt++;
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>