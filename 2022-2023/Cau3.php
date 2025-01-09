<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đặt thuê phòng</title>
</head>
<body>
    <label for="mahd">Mã hóa đơn:</label>
    <select name="MAHD" id="MAHD">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "khachsan";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection Failed! " . $conn->connect_error);
            }

            $sql = "SELECT MAHD FROM HOADON";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['MAHD'] . "'>" . $row['MAHD'] . "</option>";
                }
            }
            $conn->close();
        ?>
    </select>
    <br><br>
    <h1>Danh sách các phòng còn trống</h1>
    <table id="phongTrong">
        <tr>
            <th>STT</th>
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Chức năng</th>
        </tr>
        <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection Failed! " . $conn->connect_error);
            }
            
            $sql = "SELECT TENPHONG, MAPHONG, LOAIPHONG 
            FROM PHONG 
            WHERE TINHTRANG ='Trống'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id='{$row['MAPHONG']}'>
                            <td>{$i}</td>
                            <td>{$row['MAPHONG']}</td>
                            <td>{$row['LOAIPHONG']}</td>
                            <td><button onclick=\"themPhong('{$row['MAPHONG']}')\">Thêm</button></td>
                          </tr>";
                    $i++;
                }
            }
            $conn->close();
        ?>
    </table>

    <br>
    <h2>Danh sách các phòng đã thêm</h2>
    <table id="phongDaThem">
        <tr>
            <th>STT</th>
            <th>Mã phòng</th>
            <th>Tên phòng</th>
            <th>Chức năng</th>
        </tr>
    </table>

    <script>
    function themPhong(maPhong) {
       var maHD = document.getElementById('MAHD').value;
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
        if(this.readyState==4 && this.status == 200) {
            var response = this.responseText;
            document.getElementById(maPhong).remove();
            var phongDaThem = document.getElementById("phongDaThem");
            phongDaThem.innerHTML += response;
        }
    };
        xhttp.open("POST", "themPhong.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("maPhong=" + maPhong + "&maHD=" + maHD);
}

    function xoaPhong(maPhong) {
        var maHD = document.getElementById('MAHD').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState==4 && this.status ==200){
                var response = this.responseText;
                document.getElementById(maPhong).remove();
                var phongTrong = document.getElementById("phongTrong");
                phongTrong.innerHTML += response;
            }
        };

        // Gửi yêu cầu Ajax đến server
        xhttp.open("POST", "xoaPhong.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("maPhong=" + maPhong + "&maHD=" + maHD);
    }
</script>
</body>
</html>
