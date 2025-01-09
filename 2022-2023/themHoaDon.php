<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khachsan";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    $mahd = $_POST["mahd"];
    $tenhd = $_POST["tenhd"];
    $makh = $_POST["makh"];
    $tongtien = $_POST["tongtien"];

    $sql = "INSERT INTO HOADON (MAHD,TENHD,MAKH,TONGTIEN) values ('$mahd','$tenhd','$makh','$tongtien')";

    if($conn->query($sql)) {
        echo "New record has been added successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>