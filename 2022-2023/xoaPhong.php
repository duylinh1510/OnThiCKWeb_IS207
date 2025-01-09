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

// Xóa dữ liệu từ bảng THUE
$sql = "DELETE FROM THUE WHERE MAHD='$maHD' AND MAPHONG='$maphong'
 ";
if ($conn->query($sql)) {
    $sql = "UPDATE PHONG
            SET TINHTRANG = 'Trống'
            WHERE MAPHONG = '$maphong'";
            if($conn->query($sql)) {
                // Trả về dữ liệu phòng đã xóa
                $sql = "SELECT MAPHONG, LOAIPHONG FROM PHONG WHERE MAPHONG='$maphong'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    echo "<tr id='{$row['MAPHONG']}'>
                            <td>-</td>
                            <td>{$row['MAPHONG']}</td>
                            <td>{$row['LOAIPHONG']}</td>
                            <td><button onclick=\"themPhong('{$row['MAPHONG']}')\">Thêm</button></td>
                        </tr>";
    }
} 
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>