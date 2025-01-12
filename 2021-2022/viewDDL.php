<?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "tourismdb";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection Failed! " . $conn->connect_error);
                    }

                    $maddl = $_GET['maddl'];
                    $sql = "Select MaDDL, TenDDL From DIEMDL Where MaDDL= '$maddl'";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    $conn->close();



?>