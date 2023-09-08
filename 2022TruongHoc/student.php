<!DOCTYPE html>
<html>

<head>
    <title>Danh Sách Học Sinh Theo Lớp</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Danh Sách Học Sinh Theo Lớp</h2>

    <label for="lop">Chọn Lớp:</label>
    <select id="lop" name="lop">
        <option value="">Chọn Lớp</option>
        <?php
        include "connect.php";
        $sql = "SELECT MALOP, TENLOP FROM LOP";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['MALOP'] . "'>" . $row['TENLOP'] . "</option>";
            }
        }

        $connect->close();
        ?>
    </select><br><br>

    <div id="hoc-sinh-list">
        <!-- Danh sách học sinh sẽ được hiển thị ở đây -->
    </div>

    <script>
        $(document).ready(function() {
            $("#lop").change(function() {
                var malop = $(this).val();
                if (malop != "") {
                    $.post("get_students.php", {
                            malop: malop
                        },
                        function(data, status) {
                            if (status == "success") {
                                $("#hoc-sinh-list").html(data);
                            }
                        });
                } else {
                    $("#hoc-sinh-list").html("");
                }
            });
        });
    </script>
</body>

</html>