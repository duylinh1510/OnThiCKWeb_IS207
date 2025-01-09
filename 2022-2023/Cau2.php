<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hóa Đơn</title>
    <style>
        body { font-family: Arial, sans-serif; }
        label { display: block; margin-top: 10px; }
        input, select { margin-top: 5px; }
    </style>
</head>
<body>
    <form action="themHoaDon.php" method="POST">
        <label for="customer">Tên khách hàng</label>
        <select name="makh" id="customer" required>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "khachsan";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if($conn->connect_error) {
                    die("Connection Failed! " . $conn->connect_error);
                }

                $sql = "SELECT MAKH, TENKH FROM khachhang";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['MAKH'] . "'>" . $row['TENKH'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có khách hàng</option>"; 
                }

                $conn->close();
            ?>
        </select>
        
        <label for="mahd">Mã hóa đơn</label>
        <input type="text" name="mahd" id="mahd" placeholder="Mã hóa đơn" required>
        
        <label for="tenhd">Tên hóa đơn</label>
        <input type="text" name="tenhd" id="tenhd" placeholder="Tên hóa đơn" required>
        
        <label for="tongtien">Tổng tiền</label>
        <input type="text" name="tongtien" id="tongtien" placeholder="Tổng tiền" required>
        
        <input type="submit" value="Thêm">
    </form>
</body>
</html>
