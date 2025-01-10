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

$maxe = $_POST['maXe'];
$makh = $_POST['makh'];

// Thêm xe vào bảng thuê
$sql = "DELETE FROM THUE WHERE MAKH='$makh' AND SOXE='$maxe'";
if ($conn->query($sql) === TRUE) {
    // Cập nhật tình trạng xe
    $sql = "UPDATE XE SET TINHTRANG = 0 WHERE SOXE = '$maxe'";
    if ($conn->query($sql) === TRUE) {
        // Lấy thông tin xe để hiển thị
        $sql = "SELECT SOXE, TENXE, HANGXE, NAMSX, SOCHO, DGTHUE FROM XE WHERE SOXE = '$maxe'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<tr id='row_{$row['SOXE']}'>
            <td>{$row['SOXE']}</td>
            <td>{$row['TENXE']}</td>
            <td>{$row['HANGXE']}</td>
            <td>{$row['NAMSX']}</td>
            <td>{$row['SOCHO']}</td>
            <td>{$row['DGTHUE']}</td>
            <td><button onclick=\"themXe('{$row['SOXE']}')\">Thuê</button></td>
            </tr>";
        }
    }
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>