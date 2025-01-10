<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "musicdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    $mabh = $_POST['mabh'];
    $tenbh =$_POST['tenbh'];
    $theloai = $_POST['theloai'];
    $sql = "INSERT INTO BAIHAT(MABAIHAT, TENBAIHAT,THELOAI) values('$mabh', '$tenbh', '$theloai')";
    if($conn->query($sql)) {
        echo "Thành công!";
    }
    else echo "Thất bại!";
    $conn->close();
?>