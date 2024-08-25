<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "db_promosi";

$koneksi = mysqli_connect ($hostname, $username, $password, $database_name);

if ($koneksi->connect_error) {
    echo "koneksi gagal";
    die();
}

?>