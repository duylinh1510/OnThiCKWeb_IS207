<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourismdb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }

    $matour = $_POST['matour'];
    $tentour = $_POST['tentour'];
    $ngaykhoihanh = $_POST['ngaykhoihanh'];
    $songay = $_POST['songay'];
    $sodem = $_POST['sodem'];
    $gia = $_POST['gia'];
    $sql = "INSERT INTO TOUR(MaTour,TenTour,NgayKhoiHanh,SoNgay,SoDem,Gia) VALUES ('$matour', '$tentour', '$ngaykhoihanh', '$songay', '$sodem', '$gia')";
    $conn->query($sql);
    $conn->close();
?>