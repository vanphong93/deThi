<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['maPlaylist'])) {
    $maPlaylist = $_POST['maPlaylist'];

    include "connect.php";
    // Bắt đầu một giao dịch để đảm bảo tính nhất quán
    $connect->begin_transaction();

    // Xóa các bài hát thuộc về Playlist
    $sqlDeleteSongs = "DELETE FROM PLAYLIST_BAIHAT WHERE MaPlayList = '$maPlaylist'";
    if ($connect->query($sqlDeleteSongs) !== TRUE) {
        $connect->rollback();
        die("Lỗi khi xóa bài hát của Playlist: " . $connect->error);
    }

    // Xóa Playlist
    $sqlDeletePlaylist = "DELETE FROM PLAYLIST WHERE MaPlayList = '$maPlaylist'";
    if ($connect->query($sqlDeletePlaylist) !== TRUE) {
        $connect->rollback();
        die("Lỗi khi xóa Playlist: " . $connect->error);
    }

    // Commit giao dịch nếu thành công
    $connect->commit();

    // Trả về thông báo thành công
    echo "success";
} else {
    // Trả về thông báo lỗi nếu không có dữ liệu được gửi đến
    echo "error";
}

// Đóng kết nối đến cơ sở dữ liệu
$connect->close();
?>
