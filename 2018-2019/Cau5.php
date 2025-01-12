<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id ="dsCaSi">
        <tr>
            <td>STT</td>
            <td>Tên Bài Hát</td>
            <td>Số Lần Xuất Hiện    </td>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "musicdb";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection Failed! " . $conn->connect_error);
            }

            $sql = "SELECT bh.TenBaiHat, COUNT(pb.maplaylist) as SoLanXuatHien
                    FROM baihat bh JOIN playlist_baihat pb
                    ON bh.mabaihat = pb.mabaihat
                    GROUP BY bh.MaBaiHat, bh.TenBaiHat
                    ORDER BY SoLanXuatHien DESC LIMIT 10";

                    
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $stt=1;
                while ($rows=$result->fetch_assoc()){
                    echo "<tr> <td>" . $stt++ . "</td>
                          <td> {$rows['TenBaiHat']} </td> 
                          <td> {$rows['SoLanXuatHien']} </td>
                          </tr>";
                }
            }
        ?>
    </table>
</body>
</html>