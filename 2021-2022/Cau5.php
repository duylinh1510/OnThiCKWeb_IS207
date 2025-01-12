<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Số điểm du lịch đi qua</label>
    <input type="text" id="sodiemdulich">
    <br>
    <label for="">Số điểm du lịch mà các tour đi qua</label>
    <br>
    <table id ="table">
        <tr>
            <td>STT</td>
            <td>Tên tour</td>
            <td>Số điểm du lịch</td>
        </tr>
    </table>
</body>
</html> 
<script>
    document.getElementById("sodiemdulich").addEventListener("keypress", function (e){
        if(e.key==="Enter"){
            var xhr =new XMLHttpRequest();
            var number = document.getElementById("sodiemdulich").value;
            xhr.open("GET", "lietKeTour.php?sodiemdulich="+ number,true)
            xhr.onreadystatechange = function (){
                if(xhr.readyState==4 && xhr.status==200){
                    document.getElementById("table").innerHTML+= xhr.responseText;
                }
            };
            xhr.send();
        }
    });
</script>