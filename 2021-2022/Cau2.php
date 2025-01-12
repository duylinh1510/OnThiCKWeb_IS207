<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="themDDL.php" method="POST">
        <label for="">Tên thành phố</label>
        <select name="mattp" id="mattp">
            <option value="">Chọn tỉnh/thành phố</option> 
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourismdb";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection Failed! " . $conn->connect_error);
                }
                $sql = "SELECT MaTTP, TenTTP FROM tinhtp";
                $result = $conn->query($sql);
                while($rows = $result->fetch_assoc()){
                    echo "<option value='" . $rows['MaTTP'] . "'>" . $rows['TenTTP'] . "</option>";
                }
            ?>
        </select>
        <br>
        <label for="">Mã điểm du lịch</label>
        <input type="text" name="maddl">
        <br>
        <label for="">Tên điểm du lịch</label>
        <input type="text" name="tenddl">
        <br>
        <label for="">Đặc trưng</label>
        <input type="text" name="dactrung">
        <br>
        <button>Thêm</button>
    </form>
</body>
</html>