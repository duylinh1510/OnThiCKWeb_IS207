<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourismdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}

$maddl = $_GET['maddl'];

    $sql = "DELETE FROM CHITIET WHERE MaDDL = '$maddl'";
    if($conn->query($sql)){
        $sql = "DELETE FROM DIEMDL WHERE MaDDL = '$maddl'";
        $conn->query($sql);
    }

$conn->close();
?>