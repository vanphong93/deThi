<?php
if (isset($_POST['malop'])) {
    $malop = $_POST['malop'];
    include "connect.php";
    // Truy vấn danh sách học sinh theo lớp
    $sql = "SELECT MAHS, TENHS FROM HOCSINH WHERE MALOP = '$malop'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Stt</th>
                    <th>Tên Học Sinh</th>
                </tr>";
        $stt = 0;
        while ($row = $result->fetch_assoc()) {
            $stt += 1;
            echo "<tr>
                    <td>" . $stt . "</td>
                    <td>" . $row['TENHS'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có học sinh nào trong lớp này.";
    }

    $connect->close();
}
