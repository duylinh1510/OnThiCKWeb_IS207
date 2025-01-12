<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourismdb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    $sodiemdulich = $_GET['sodiemdulich'];
    $sql = "SELECT T.TenTour, COUNT(CT.MaDDL) as SoDiemDuLich
            FROM TOUR T
            JOIN ChiTiet CT ON T.MaTour = CT.MaTour
            JOIN DiemDL DDL ON DDL.MaDDL = CT.MaDDL
            Group By T.TenTour
            HAVING COUNT(CT.MaDDL) >= '$sodiemdulich' ";
    $result=$conn->query(($sql));
    $stt=1;
    while($rows=$result->fetch_assoc()){
        echo "<tr>
                  <td>" . $stt++ . "</td>
                  <td> {$rows['TenTour']} </td>
                  <td> {$rows['SoDiemDuLich']} </td> </tr>";
    }
    $conn->close();
?>