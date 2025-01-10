<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "musicdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }

    $ngaysinh = $_GET['ngaysinh'];
    $danhSachCaSi = "";
    $stt =1;
    $sql = "SELECT TENCASI FROM CASI WHERE NAMSINH = '$ngaysinh'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
    while($rows=$result->fetch_array()){
        $danhSachCaSi .= "<tr><td>" . $stt++ . "</td> 
                          <td> {$rows['TENCASI']} </td></tr>";
    }
    echo $danhSachCaSi; 
}

    $conn->close();

?>