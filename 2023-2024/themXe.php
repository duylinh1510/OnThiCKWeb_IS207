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
$maxe = $_POST['maxe'];
$tenxe = $_POST['tenxe'];
$hangxe = $_POST['hangxe'];
$socho = $_POST['socho'];
$nsx = $_POST['nsx'];
$dongia = $_POST['dongia'];
$sql = "INSERT INTO XE(SOXE, TENXE, HANGXE, SOCHO, NAMSX, DGTHUE, TINHTRANG) Values('$maxe','$tenxe','$hangxe', '$socho', '$nsx', '$dongia',0)";
if( $conn->query($sql)) {
    echo "Thêm xe thành công!";
}
?>