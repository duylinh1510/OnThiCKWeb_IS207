<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thuexe";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed! " . $conn->connect_error);
}

$ngaythue = $_GET['ngaythue'];
$sql = "SELECT KH.TENKH, X.SOXE, X.TENXE From KHACHHANG KH JOIN THUE T ON KH.MAKH = T.MAKH
                                                    JOIN XE X ON T.SOXE = X.SOXE
                                                    WHERE NGAYTHUE = '$ngaythue' and TINHTRANG = 1";
$danhSachXe = "";
$result = $conn->query($sql);
if($result->num_rows>0){
    $stt=1;
    while($rows=$result->fetch_assoc()){
        $danhSachXe .= "<tr><td> " . $stt++ . " </td>
                            <td> {$rows['TENKH']} </td>
                            <td> {$rows['SOXE']} </td>
                            <td> {$rows['TENXE']} </td>
                            </tr>";
    }
    echo $danhSachXe;
}
?>