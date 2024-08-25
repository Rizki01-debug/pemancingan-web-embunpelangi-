<?php 
$cssHalaman = '<link rel="stylesheet" href="assets/home.css">';
$active1 = 'class="active"';
require 'layout/header.php';
?>
 
<!-- bacground img -->
      <?php

      // Ambil data dari tabel info_web
      $query = "SELECT gambar_beranda FROM info_web LIMIT 1";
      $result = mysqli_query($koneksi, $query);
      $gambar_beranda = '';

      if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $gambar_beranda = $row['gambar_beranda'];
      }

      ?>
    <div style="background-image: url('public/img/<?php echo htmlspecialchars($gambar_beranda); ?>'); background-size: contain; background-repeat: no-repeat; background-position: center; height: 100vh; display: flex; justify-content: center; align-items: center; color: #fff; text-align: center;">
        <!-- Konten di sini -->
    </div>

<?php include_once 'layout/footer.php'?>