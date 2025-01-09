<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traXe.php" method = "POST">
    <label for="">Họ tên khách hàng</label>
    <select name="makh" id="hoten">
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
        $sql = "Select MAKH, TENKH FROM KHACHHANG";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($rows=$result->fetch_assoc()){
                echo "<option value ='" . $rows['MAKH'] . "'>" . $rows['TENKH'] . "</option>";
            }
        }
    ?>
    </select>
    <br>
    <label for="">Số xe</label>
    <input type="text" name = "soxe" placeholder="51H-xxx.xx">
    <br>
    <label for="">Ngày thuê</label>
    <input type="date" name = "ngaythue">
    <br>
    <label for="">Ngày trả</label>
    <input type="date" name = "ngaytra">
    <br>
    <button name="traxe">Trả xe</button>
    </form>
</body>
</html>