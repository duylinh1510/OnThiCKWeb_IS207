<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thuê xe</h1>
    <form id="thueXeForm">
        <label for="">Họ tên khách hàng</label>
        <select name="makh" id="makh">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "thuexe";
                
                // Tạo kết nối
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }
                $sql = "SELECT MAKH, TENKH FROM KHACHHANG";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){
                        echo "<option value='" . $rows['MAKH'] . "'>" . $rows['TENKH'] . "</option>"; 
                    }
                }
            ?>
        </select>
        <label for="">Ngày thuê xe</label>
        <input type="date" name="ngayThue" id="ngayThue">
    </form>
    <br>
    <h2>Danh sách các xe chưa được thuê</h2>
    <table id="dsCacXeChuaDuocThue">
        <tr>
            <td>Số xe</td>
            <td>Tên xe</td>
            <td>Hãng xe</td>
            <td>Năm sản xuất</td>
            <td>Số chỗ</td>
            <td>Đơn giá thuê</td>
            <td>Chọn thuê</td>
        </tr>
        <?php
            $sql = "SELECT SOXE, TENXE, HANGXE, NAMSX, SOCHO, DGTHUE FROM XE WHERE TINHTRANG = 0";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    echo "<tr id='row_{$rows['SOXE']}'>
                    <td>{$rows['SOXE']}</td>
                    <td>{$rows['TENXE']}</td>
                    <td>{$rows['HANGXE']}</td>
                    <td>{$rows['NAMSX']}</td>
                    <td>{$rows['SOCHO']}</td>
                    <td>{$rows['DGTHUE']}</td>
                    <td><button onclick=\"themXe('{$rows['SOXE']}')\">Thêm</button></td>
                    </tr>"; 
                }
            }
            $conn->close();
        ?>
    </table>

    <h2>Danh sách các xe thuê</h2>
    <table id="dsCacXeThue">
        <tr>
            <td>Số xe</td>
            <td>Tên xe</td>
            <td>Hãng xe</td>
            <td>Năm sản xuất</td>
            <td>Số chỗ</td>
            <td>Đơn giá thuê</td>
            <td>Không thuê</td>
        </tr>
    </table>
    <script>
        function themXe(maXe) {
            var maKH = document.getElementById("makh").value;
            var ngayThue = document.getElementById("ngayThue").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "themXeThue.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("row_"+ maXe).remove();
                    document.getElementById("dsCacXeThue").innerHTML += this.responseText;
                }
            };
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("maXe=" + maXe + "&makh=" + maKH + "&ngayThue=" + ngayThue);
        }

        function xoaXe(maXe) {
            var maKH = document.getElementById("makh").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "xoaXeThue.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("row_thue_" + maXe).remove();
                    document.getElementById("dsCacXeChuaDuocThue").innerHTML += this.responseText;
                }
            };
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("maXe=" + maXe + "&makh=" + maKH);
        }
    </script>
</body>
</html>