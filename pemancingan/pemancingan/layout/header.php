<?php
session_start();
require "config/koneksi.php";
?>

<?php

// Ambil data dari tabel info_web
$queryInfo = "SELECT * FROM info_web LIMIT 1";
$resultInfo = mysqli_query($koneksi, $queryInfo);
$nama_webI = '-';
$emailI = '-';
$teleponI = '-';
$nama_igI = '-';
$link_igI = '-';
$link_gmapsI = '-';
$alamatI = '-';
$logoI = '-';

if (mysqli_num_rows($resultInfo) > 0) {
$row = mysqli_fetch_assoc($resultInfo);
$nama_webI = $row['nama_web'];
$emailI = $row['email'];
$teleponI = $row['telepon'];
$nama_igI = $row['nama_ig'];
$link_igI = $row['link_ig'];
$link_gmapsI = $row['link_gmaps'];
$alamatI = $row['alamat'];
$logoI = $row['logo'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Embun Pelangi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $cssHalaman ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      </head>
<body>
    
<?php include_once 'menu.php';