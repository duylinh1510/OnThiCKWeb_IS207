<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourismdb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }

    $mattp = $_GET['mattp'];
    $sql= "Select TenTTP From tinhtp Where MaTTP= '$mattp'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    echo $row['TenTTP'];
    $conn->close();
?>