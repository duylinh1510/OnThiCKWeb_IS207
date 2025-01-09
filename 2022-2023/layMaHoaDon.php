<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khachsan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}

$makh = htmlspecialchars($_GET['makh'], ENT_QUOTES, 'UTF-8');

$sql = "SELECT MAHD FROM HOADON WHERE MAKH = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $makh);
$stmt->execute();
$result = $stmt->get_result();

$options = "";
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $options .= "<option value='" . $rows['MAHD'] . "'>" . $rows['MAHD'] . "</option>";
    }
}
echo $options;

$stmt->close();
$conn->close();
?>