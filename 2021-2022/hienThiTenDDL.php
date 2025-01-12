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
    $sql= "Select TenDDL From diemdl Where MaDDL= '$maddl'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    echo $row['TenDDL'];
    $conn->close();
?>