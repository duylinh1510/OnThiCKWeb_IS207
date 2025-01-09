<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khachsan";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    $makh = $_POST["makh"];
    $tenkh = $_POST["tenkh"];
    $sdt = $_POST["sdt"];
    $cccn = $_POST["cccn"];

    $sql = "INSERT INTO KHACHHANG (MAKH,TENKH,SDT,CCCN) values ('$makh','$tenkh','$sdt','$cccn')";

    if($conn->query($sql)) {
        echo "New record has been added successfully!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>