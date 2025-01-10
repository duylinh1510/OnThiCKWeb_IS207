<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "musicdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }
    $stt = 1;
    $playList="";
    $mann = $_GET['mann'];
    $sql = "SELECT PL.MaPlayList, PL.TenPlayList From PlayList PL JOIN NguoiNghe NN ON PL.MaNN=NN.MaNN WHERE NN.MaNN='$mann'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($rows=$result->fetch_assoc()){
            $playList .= "<tr id = 'playlist_" .$rows['MaPlayList'] . "'>
                          <td>". $stt++ . "</td>
                          <td> {$rows['TenPlayList']} </td>
                          <td> <button onclick=\"xoaPlayList('" .$rows['MaPlayList']. "')\">Xóa</button> </td>";
        }
        echo $playList;
    }
    $conn->close();
?>