<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Từ ngày</label>
    <input type="text" id = "tungay">
    <label for="">Đến ngày</label>
    <input type="text" id = "denngay">
    <br>
    <label for="">Họ tên khách hàng</label>
    <select name="makh" id="makh" value='makh' onchange="hienThiDSXeTra()">
        <option value="">Chọn khách hàng</option>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "thuexe";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection Failed! " . $conn->connect_error);
            }

            $sql = "Select MAKH, TENKH FROM KHACHHANG";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($rows = $result->fetch_assoc()){
                    echo "<option value = '{$rows['MAKH']}'>  {$rows['TENKH']} </option>";
                }
            }
        ?>
    </select>
    <table id="dsXeTra">
        <tr>
            <td>STT</td>
            <td>Số xe</td>
            <td>Tên xe</td>
            <td>Giá thuê</td>
        </tr>
    </table>
</body>
</html>
<script>
    function hienThiDSXeTra(){
    var makh = document.getElementById("makh").value;
    var tungay = document.getElementById("tungay").value;
    var denngay = document.getElementById("denngay").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "layDanhSachTraXe.php?makh=" + makh + "&tungay=" + tungay + "&denngay=" + denngay, true);
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status == 200){
            document.getElementById("dsXeTra").innerHTML = 
            `<tr>
            <td>STT</td>
            <td>Số xe</td>
            <td>Tên xe</td>
            <td>Giá thuê</td>
            </tr>`
            + xhr.responseText;
        }
    };
    xhr.send();
}
</script>