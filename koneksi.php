<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "mystudy_plan";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Koneksi Gagal";
    }
?>