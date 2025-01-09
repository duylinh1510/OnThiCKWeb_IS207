<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<label for="tenkh">Tên khách hàng</label>
<select name="makh" id="tenkh">
    <?php 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "khachsan";

     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
         die("Connection Failed! " . $conn->connect_error);
     }
     $sql =  "SELECT MAKH, TENKH FROM KHACHHANG";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            echo "<option value='" . $rows['MAKH'] . "'>" . $rows['TENKH'] . "</option>"; 
        }
     }
    ?>
</select>
<br>
<label for="mahd">Mã hóa đơn</label>
<select name="mahd" id="mahd">
</select>

<table id="danhSachPhong">
    <tr>
        <td>STT</td>
        <td>Mã phòng</td>
        <td>Loại phòng</td>
    </tr>
</table>
<script>
document.getElementById("tenkh").addEventListener("change", function() {
    var makh = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "layMaHoaDon.php?makh=" + encodeURIComponent(makh), true);
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('mahd').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});

document.getElementById("mahd").addEventListener("change", function() {
    var mahd = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "layPhongTuMaHD.php?mahd=" + encodeURIComponent(mahd), true);
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById("danhSachPhong").innerHTML = `
                <tr>
                    <td>STT</td>
                    <td>Mã phòng</td>
                    <td>Loại phòng</td>
                </tr>
            ` + xhr.responseText;
        }
    };
    xhr.send();
});
</script>
</body>
</html>