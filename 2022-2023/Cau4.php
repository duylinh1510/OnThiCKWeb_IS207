<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Nhập số lượng khách hàng</label>
    <input type="text" id="submit">
    <h1>3 khách hàng có số tiền thuê nhiều nhất</h1>
    <table id = "tongTienKhachHang">
        <tr>
            <td>STT</td>
            <td>Mã khách hàng</td>
            <td>Tên khách hàng</td>
            <td>Tổng tiền thuê</td>
        </tr>
    </table>
</body>
</html>
<script>
   document.getElementById('submit').addEventListener('keypress', function (e){
        if(e.key === 'Enter'){
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "timKiem3KhachHang.php?limit=" + this.value, true);
            xhr.onreadystatechange = function(){
                if(this.readyState==4 && this.status == 200) {
                    var table = document.getElementById('tongTienKhachHang');
                    table.innerHTML =
                    `<tr>
                        <td>STT</td>
                        <td>Mã khách hàng</td>
                        <td>Tên khách hàng</td>
                        <td>Tổng tiền thuê</td>
                     </tr>`;
                     table.innerHTML += this.responseText;
                }
            };
            xhr.send();
        }
   });
</script>