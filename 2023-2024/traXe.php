<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "thuexe";
        
        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $makh = $_POST['makh'];
        $soxe = $_POST['soxe'];
        $ngaythue = $_POST['ngaythue'];
        $ngaytra = $_POST['ngaytra'];
        $date1 = new DateTime($ngaythue);
        $date2 = new DateTime($ngaytra);
        $interval = $date1->diff($date2);
        $songaythue = $interval->days;
        $sql = "UPDATE THUE
                SET NgayTra = '$ngaytra'
                WHERE MAKH = '$makh'";
        if($conn->query($sql)){
            $sql = "UPDATE XE
                    SET TINHTRANG = 0
                    WHERE SOXE = '$soxe' ";
            if($conn->query($sql)){
                $sql = "SELECT DGTHUE FROM XE WHERE SOXE='$soxe'";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    $row = $result->fetch_assoc();
                    $dongiaxe = $row['DGTHUE'];
                    $giathue = $dongiaxe * $songaythue;
                    $sql = "UPDATE THUE
                            SET GIATHUE = '$giathue'
                            WHERE MAKH = '$makh'";
                            if ($conn->query($sql) === TRUE) {
                                echo "Cập nhật thành công";
                            } else {
                                echo "Lỗi cập nhật giá thuê: " . $conn->error;
                            }
                        } else {
                            echo "Không tìm thấy đơn giá thuê";
                        }
                }
                    else {
                        echo "Lỗi cập nhật tình trạng xe: " . $conn->error;
                    }
            }
            else {
                echo "Lỗi cập nhật ngày trả: " . $conn->error;
            }
        $conn->close();
?>