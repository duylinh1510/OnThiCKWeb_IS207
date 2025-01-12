<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="themTour.php" method = "POST" >
    <label for="">Mã tour</label>
    <input type="text" name ="matour" placeholder="MC01">
    <br>
    <label for="">Tên tour</label>
    <input type="text" name="tentour" placeholder="Cắm trại">
    <br>
    <label for="">Ngày khởi hành</label>
    <input type="date" name="ngaykhoihanh">
    <br>
    <label for="">Số ngày</label>
    <input type="text" name = 'songay' placeholder="3">
    <br>
    <label for="">Số đêm</label>
    <input type="text" name = 'sodem' placeholder="2">
    <br>
    <label for="">Giá</label>
    <input type="text" name = "gia" placeholder="3000000">
    <br>
    <button>Thêm</button>
    
</form>
</body>
</html>