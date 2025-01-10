<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "musicdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed! " . $conn->connect_error);
    }

    $maplaylist = $_GET['maplaylist'];
    
    $sql = "DELETE FROM playlist_baihat WHERE MaPlayList = '$maplaylist'";
    if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM playlist WHERE MaPlayList = '$maplaylist'";
        if ($conn->query($sql) === TRUE) {
        echo "Playlist deleted successfully.";
        } else {
        echo "Error deleting playlist: " . $conn->error;
    }
} else {
    echo "Error deleting songs from playlist: " . $conn->error;
}


    $conn->close(); 
?>