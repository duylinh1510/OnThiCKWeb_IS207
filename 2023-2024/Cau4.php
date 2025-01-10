<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Chọn ngày</label>
    <input type="text" name="ngaythue" id = "ngaythue">
    <table id="danhSachXeThue">
        <tr>
            <td>STT</td>
            <td>Họ tên khách hàng</td>
            <td>Số xe</td>
            <td>Tên xe</td>
        </tr>
    </table>
</body>
</html>
<script>
    document.getElementById("ngaythue").addEventListener("keypress", function(e){
        if(e.key=="Enter"){
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "hienThiDSXeThue.php?ngaythue=" + this.value, true);
            xhr.onreadystatechange = function (){
                if(xhr.readyState==4 && xhr.status==200){
                    document.getElementById("danhSachXeThue").innerHTML =
                    `<tr>
                        <td>STT</td>
                        <td>Họ tên khách hàng</td>
                        <td>Số xe</td>
                        <td>Tên xe</td>
                    </tr>` + this.responseText;
                }
            };
            xhr.send();
        }
    });
</script>