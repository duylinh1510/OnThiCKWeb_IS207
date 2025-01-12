
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Mã Tỉnh Thành</label>
    <input type="text" id="mattp">
    <input type="text" id ="tenttp"readonly>
    <br>
    <label for="">Mã Điểm du lịch</label>
    <input type="text" id="maddl">
    <input type="text" id= "tenddl">
    
</body>
</html>

<script>
        document.getElementById("mattp").addEventListener("keypress", function(e){
            if(e.key==="Enter"){
                var mattp = document.getElementById("mattp").value;
                var xhr = new XMLHttpRequest();
                xhr.open("GET","hienThiTenTinhThanhPho.php?mattp="+encodeURIComponent(mattp), true);
                xhr.onreadystatechange = function() {
                    if(xhr.readyState==4 && xhr.status==200){
                        document.getElementById("tenttp").value = xhr.responseText;
                    }
                };
                xhr.send();
            }
        });


        document.getElementById("maddl").addEventListener("keypress", function(e){
            if(e.key==="Enter"){
                var xhr = new XMLHttpRequest();
                var maddl = document.getElementById("maddl").value;
                xhr.open("GET", "hienThiTenDDL.php?maddl="+ encodeURIComponent(maddl), true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState==4 && xhr.status==200){
                        document.getElementById("tenddl").value = xhr.responseText;
                    }
                };
                xhr.send();
            }
        })
</script>