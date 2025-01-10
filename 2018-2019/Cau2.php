<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="ngaysinh">Ngày sinh</label>
    <input type="date" id="ngaysinh" onchange="timCaSi()">
    <h3>Danh sách ca sĩ</h3>
    <table id="DSCaSi">
        <tr>
            <td>STT</td>
            <td>Ca sĩ</td>
        </tr>
    </table>
</body>
</html>

<script>
    function timCaSi() {
        var ngaySinh = document.getElementById("ngaysinh").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "timCaSi.php?ngaysinh=" + ngaySinh, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("DSCaSi").innerHTML =
                    `<tr>
                        <td>STT</td>
                        <td>Ca sĩ</td>
                    </tr>` + xhr.responseText;
            }
        };
        xhr.send();
    }
</script>