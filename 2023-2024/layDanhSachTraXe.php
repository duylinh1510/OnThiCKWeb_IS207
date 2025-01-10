<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "thuexe";
     
     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
         die("Connection Failed! " . $conn->connect_error);
     }
     $makh = $_GET['makh'];
     $tungay = $_GET['tungay'];
     $denngay = $_GET['denngay'];

     $sql = "SELECT X.SOXE, X.TENXE, T.GIATHUE
             FROM XE X JOIN THUE T ON X.SOXE = T.SOXE
             WHERE T.MAKH = '$makh' and T.NGAYTRA BETWEEN '$tungay' and '$denngay' AND X.TINHTRANG = 0";
     $danhSachXeTra = "";
     
     $result = $conn->query($sql);
     if($result->num_rows>0){
        $stt=1;
        while($rows=$result->fetch_assoc()){
            $danhSachXeTra .= "<tr><td>" . $stt++ . "</td>
                                   <td> {$rows['SOXE']} </td>
                                   <td> {$rows['TENXE']} </td>
                                   <td> {$rows['GIATHUE']} </td>";
        }
        echo $danhSachXeTra;
     }

?>