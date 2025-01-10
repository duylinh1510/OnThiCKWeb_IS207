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
            <td>Tên Ca Sĩ</td>
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

            $sql = "SELECT CS.TenCaSi,CS.MaCaSi From CaSi CS 
            JOIN CaSi_BaiHAT CB ON CS.MaCaSi = CB.MaCaSi
            GROUP BY CS.TenCaSi,CS.MaCaSi   
            HAVING COUNT(CB.MaBaiHat) = (Select Count(*) From BaiHat)";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $stt=1;
                while ($rows=$result->fetch_assoc()){
                    echo "<tr> <td>" . $stt++ . "</td>
                          <td> {$rows['TenCaSi']} </td> </tr>";
                }
            }
        ?>
    </table>
</body>
</html>