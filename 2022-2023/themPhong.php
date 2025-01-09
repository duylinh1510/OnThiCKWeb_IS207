<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khachsan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}

$maphong = $_POST['maPhong'];
$maHD = $_POST['maHD'];
$ngaythue = date('Y-m-d'); // Ngày thuê hiện tại
$ngaytra = date('Y-m-d', strtotime('+1 day')); // Ngày trả là ngày hôm sau
$giathue = 100000; // Giá thuê cố định, bạn có thể thay đổi theo yêu cầu

// Thêm dữ liệu vào bảng THUE
$sql = "INSERT INTO THUE (MAHD, MAPHONG, NGAYTHUE, NGAYTRA, GIATHUE) VALUES ('$maHD', '$maphong', '$ngaythue', '$ngaytra', '$giathue')";
if ($conn->query($sql)) {
    $sql = "UPDATE PHONG
            SET TINHTRANG = 'Đang thuê'
            WHERE MaPhong = '$maphong'";
            if($conn->query($sql)) {
    // Trả về dữ liệu phòng đã thêm
                $sql = "SELECT MAPHONG, LOAIPHONG FROM PHONG WHERE MAPHONG='$maphong'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    echo "<tr id='{$row['MAPHONG']}'>
                            <td>-</td>
                            <td>{$row['MAPHONG']}</td>
                            <td>{$row['LOAIPHONG']}</td>
                            <td><button onclick=\"xoaPhong('{$row['MAPHONG']}')\">Xóa</button></td>
                        </tr>";
    }
} 
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>