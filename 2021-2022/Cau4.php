<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourismdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $mattp = $_POST['mattp'];
    $dactrung = $_POST['dactrung'];
    $sql = "UPDATE DiemDL SET TenDDL = '$tenddl', MaTTP = '$mattp', DacTrung = '$dactrung' WHERE MaDDL = '$maddl'";
    $conn->query(($sql));
    $conn->close();
?>
