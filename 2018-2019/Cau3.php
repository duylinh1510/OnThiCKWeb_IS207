<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Tên người nghe</label>
    <select name="mann" id="mann" onchange="timPlayList()">
        <option value="">Chọn người nghe</option>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "musicdb";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection Failed! " . $conn->connect_error);
            }

            $sql = "SELECT MaNN,TenNN FROM NguoiNghe";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($rows=$result->fetch_assoc()){
                    echo "<option value='" . $rows['MaNN'] . "'>" . $rows['TenNN'] . "</option>";
                }
            }
        ?>
    </select>
    <table id ="dsPlayList">
        <tr>
            <td>STT</td>
            <td>Tên playlist</td>
            <td>Chức năng</td>
        </tr>
    </table>
</body>
</html>

<script>
        function timPlayList(){
            var mann = document.getElementById("mann").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "timPlayList.php?mann=" + mann, true);
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4 && xhr.status==200){
                    document.getElementById("dsPlayList").innerHTML=
                    `<tr>
                        <td>STT</td>
                        <td>Tên playlist</td>
                        <td>Chức năng</td>
                    </tr>` + xhr.responseText;
                }
            };
            xhr.send();
        }
</script>

<script>
       function xoaPlayList(maPlayList) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("playlist_" + maPlayList).remove();
        }
    };
    xhr.open("GET", "xoaPlayList.php?maplaylist=" + maPlayList, true);
    xhr.send();
}

</script>