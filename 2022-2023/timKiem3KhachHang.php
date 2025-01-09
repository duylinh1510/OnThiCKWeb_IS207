<?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "khachsan";

         $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
             die("Connection Failed! " . $conn->connect_error);
         }
        $limit = $_GET['limit'];

        $sql="SELECT HD.MAKH,TENKH,HD.TONGTIEN
        FROM HOADON HD
        JOIN KHACHHANG KH ON HD.MAKH = KH.MAKH
        ORDER BY HD.TONGTIEN DESC LIMIT ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0){
            $i=1;
            while($rows=$result->fetch_assoc()){
                echo "<tr><td>".$i++ . "</td>". "<td>". $rows['MAKH'] . "</td>" . 
                "<td>". $rows['TENKH'] . "</td>" .
                "<td>" . $rows['TONGTIEN'] . "</td></tr>";
            }
        }
        $stmt->close();
        $conn->close();
?>