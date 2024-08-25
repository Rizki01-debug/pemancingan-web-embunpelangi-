<?php 
$cssHalaman = '<link rel="stylesheet" href="assets/tentang.css">';
$active5 = 'class="active"';
require 'layout/header.php';
?>

<?php

// Ambil data dari tabel info_web
$query = "SELECT tentang_kami, link_yt FROM info_web LIMIT 1";
$result = mysqli_query($koneksi, $query);
$tentang_kami = '';
$link_yt = '';

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$tentang_kami = $row['tentang_kami'];
$link_yt = $row['link_yt'];
}

?>

<!-- header -->
<div class="ruang">
  <div class="container">
    <h1>Tentang Embun Pelangi</h1>
    <p class="sutitle">
    <?php echo htmlspecialchars($tentang_kami); ?>
  </div>
</div>

<!-- video youtube -->

<center>
<div class="video-container">
        <iframe src="<?php echo htmlspecialchars($link_yt); ?>"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
</div>
</center>

<?php include_once 'layout/footer.php'?>