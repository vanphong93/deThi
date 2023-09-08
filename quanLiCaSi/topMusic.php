<?php
include "connect.php";

// Truy vấn dữ liệu
$sql = "SELECT TenBaiHat, COUNT(*) AS SoLanXuatHien
        FROM BAIHAT
        INNER JOIN PLAYLIST_BAIHAT ON BAIHAT.MaBaiHat = PLAYLIST_BAIHAT.MaBaiHat
        GROUP BY TenBaiHat
        ORDER BY SoLanXuatHien DESC
        LIMIT 10";

$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liệt Kê 10 Bài Hát Được Nghe Nhiều Nhất</title>
</head>
<body>
    <h2>Liệt Kê 10 Bài Hát Được Nghe Nhiều Nhất</h2>

    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Bài Hát</th>
                <th>Số Lần Xuất Hiện Trong Playlist</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $stt . "</td>
                            <td>" . $row["TenBaiHat"] . "</td>
                            <td>" . $row["SoLanXuatHien"] . "</td>
                          </tr>";
                    $stt++;
                }
            } else {
                echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
