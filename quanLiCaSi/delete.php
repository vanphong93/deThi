
<!DOCTYPE html>
<html>

<head>
    <title>Liệt Kê Playlist</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>Liệt Kê Playlist</h2>

    <!-- Combobox để chọn người dùng -->
    <label for="nguoiNghe">Chọn Người Nghe:</label>
    <select id="nguoiNghe">
        <option value="">Chọn Người Nghe</option>
        <?php
     include "connect.php";
     // Truy vấn dữ liệu từ bảng NGUOINGHE
     $sql = "SELECT MaNN, TenNN FROM NGUOINGHE";
     $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["MaNN"] . "'>" . $row["TenNN"] . "</option>";
            }
        }
        ?>
    </select>

    <!-- Bảng để hiển thị danh sách Playlist -->
    <h3>Danh Sách Playlist</h3>
    <table id="playlistTable" border="1">
        <thead>
            <tr>
                <th>Mã Playlist</th>
                <th>Tên Playlist</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
         
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            // Xử lý khi người dùng chọn người nghe
            $("#nguoiNghe").change(function() {
                var maNN = $(this).val();

                if (maNN !== "") {
                    // Sử dụng Ajax để tải danh sách Playlist cho người nghe đã chọn
                    $.ajax({
                        type: "POST",
                        url: "get_playlists.php",
                        data: {
                            maNN: maNN
                        },
                        dataType: "json",
                        success: function(data) {
                            var table = $("#playlistTable tbody");
                            table.empty();

                            $.each(data, function(index, playlist) {
                                var row = "<tr>" +
                                    "<td>" + playlist.MaPlayList + "</td>" +
                                    "<td>" + playlist.TenPlayList + "</td>" +
                                    "<td><a href='#' onclick='deletePlaylist(\"" + playlist.MaPlayList + "\")'>Xóa</a></td>" +
                                    "</tr>";

                                table.append(row);
                            });
                        },
                        error: function() {
                            alert("Có lỗi xảy ra khi tải dữ liệu.");
                        }
                    });
                } else {
                    // Nếu không có người nghe nào được chọn, xóa dữ liệu hiển thị
                    var table = $("#playlistTable tbody");
                    table.empty();
                }
            });
        });

        function deletePlaylist(maPlaylist) {
            // Sử dụng Ajax để xóa Playlist và các bài hát của Playlist khỏi cơ sở dữ liệu
            $.ajax({
                type: "POST",
                url: "delete_playlist.php",
                data: {
                    maPlaylist: maPlaylist
                },
                success: function(response) {
                    if (response === "success") {
                        // Xóa dòng được chọn trên web
                        var row = $("#playlistTable tbody tr:contains('" + maPlaylist + "')");
                        row.remove();
                    } else {
                        alert("Có lỗi xảy ra khi xóa Playlist.");
                    }
                },
                error: function() {
                    alert("Có lỗi xảy ra khi xóa Playlist.");
                }
            });
        }
    </script>
</body>

</html>