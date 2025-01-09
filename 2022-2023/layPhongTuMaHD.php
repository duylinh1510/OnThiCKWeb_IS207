<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khachsan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}

$mahd = htmlspecialchars($_GET['mahd'], ENT_QUOTES, 'UTF-8');

$sql = "SELECT P.MAPHONG, P.LOAIPHONG FROM PHONG P JOIN THUE T ON P.MAPHONG = T.MAPHONG WHERE T.MAHD = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $mahd);
$stmt->execute();
$result = $stmt->get_result();

$phong = "";
if ($result->num_rows > 0) {
    $stt = 1;
    while ($rows = $result->fetch_assoc()) {
        $phong .= "<tr><td>" . $stt++ . "</td><td>" . $rows["MAPHONG"] . "</td><td>" . $rows["LOAIPHONG"] . "</td></tr>";
    }
    echo $phong;
}

$stmt->close();
$conn->close();
?>