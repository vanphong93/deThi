<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['maNN'])) {
    $maNN = $_POST['maNN'];
    include "connect.php";

    // Truy vấn danh sách Playlist cho người nghe đã chọn
    $sql = "SELECT MaPlayList, TenPlayList FROM PLAYLIST WHERE MaNN = '$maNN'";
    $result = $connect->query($sql);

    $playlists = array();
    while ($row = $result->fetch_assoc()) {
        $playlists[] = $row;
    }

    // Trả về danh sách Playlist dưới dạng JSON
    echo json_encode($playlists);
} else {
    // Trả về thông báo lỗi nếu không có dữ liệu được gửi đến
    echo "error";
}

// Đóng kết nối đến cơ sở dữ liệu
$connect->close();
