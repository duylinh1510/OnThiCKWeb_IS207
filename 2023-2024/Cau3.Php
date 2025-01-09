<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thuê xe</h1>
    <label for="">Họ tên khách hàng</label>
    <select name="makh" id="tenkh">
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
                    echo "<option value='" . $rows['MAKH'] . "'>" . $rows['TENKH'] . "</option>"; 
                }
             }
        ?>
    </select>
    <label for="">Ngày thuê xe</label>
    <input type="date" name = "ngaythue">
    <br>
    <h2>Danh sách các xe chưa được thuê</h2>
    <table id ="dsCacXeChuaDuocThue">
        <tr>
            <td>Số xe</td>
            <td>Tên xe</td>
            <td>Hãng xe</td>
            <td>Năm sản xuất</td>
            <td>Số chỗ</td>
            <td>Đơn giá thuê</td>
            <td>Chọn thuê</td>
        </tr>

    </table>
</body>
</html>