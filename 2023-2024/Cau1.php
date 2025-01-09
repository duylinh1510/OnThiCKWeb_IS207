<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm xe</h1>
    <form action="themXe.php" method = "POST">
    <label for="">Mã xe</label>
    <input type="text" name = "maxe" placeholder="51E-xxx.xx">
    <br>
    <label for="">Tên xe</label>
    <input type="text" name = "tenxe" placeholder="Forester">
    <br>
    <label for="">Hãng xe</label>
    <input type="text" name = "hangxe" placeholder="Subaru">
    <br>
    <label for="">Số chỗ</label>
    <input type="text" name = "socho" placeholder="5">
    <br>
    <label for="">Năm sản xuất</label>
    <input type="text" name = "nsx" placeholder="Năm sản xuất">
    <br>
    <label for="">Đơn giá thuê</label>
    <input type="text" name = "dongia" placeholder="Đơn giá thuê">
    <br>
    <button name="them">Thêm</button>
    </form>
</body>
</html>