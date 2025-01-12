<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourismdb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    
    $mattp = $_POST['mattp'];
    $maddl = $_POST['maddl'];
    $tenddl = $_POST['tenddl'];
    $dactrung = $_POST['dactrung'];
    
    // Check if MaTTP exists in tinhtp table
    $check_sql = "SELECT MaTTP FROM tinhtp WHERE MaTTP = '$mattp'";
    $result = $conn->query($check_sql);
    
    if ($result->num_rows > 0) {
        // MaTTP exists, proceed with insert
        $sql = "INSERT INTO DIEMDL(MADDL, TENDDL, MATTP, DACTRUNG) VALUES ('$maddl', '$tenddl', '$mattp', '$dactrung')";
        if ($conn->query($sql) === TRUE) {
            echo "Added Successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // MaTTP does not exist
        echo "Error: MaTTP does not exist in tinhtp table.";
    }
    
    $conn->close();
?>