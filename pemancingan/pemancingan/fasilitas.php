<?php 
$cssHalaman = '<link rel="stylesheet" href="assets/fasilitas.css">';
$active3 = 'class="active"';
require 'layout/header.php';
?>

    <div class="ruang">
      <div class="container">
        <h1>Fasilitas Rekreasi</h1>
        <p class="sutitle">
        Selain menjadi tempat yang ideal untuk bersantai dan menikmati keindahan alam, Embun Pelangi juga menawarkan pengalaman rekreasi keluarga yang tak terlupakan. 
        Temukan berbagai kreasi yang telah kami sediakan, serta fasilitas-fasilitas yang siap memenuhi kebutuhan liburan Anda.
         
        </p>
      </div>
      </div>
  
  <section>
    <div class="card-container">
    <?php
    $query = "SELECT * FROM fasilitas";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <div class="card-content">
                    <img src="public/img/<?php echo htmlspecialchars($row['gambar_fasilitas']); ?>" alt="<?php echo htmlspecialchars($row['nama_fasilitas']); ?>">
                    <div class="text-container">
                        <h2 class="title"><?php echo htmlspecialchars($row['nama_fasilitas']); ?></h2>
                        <p class="subtitle">
                            <?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Tidak ada data fasilitas yang ditemukan.";
    }

    ?>
    </section>

    <!-- pengumuman -->

    <center>
    <div class="announcement-container">
      <h1>Pengumuman Penting Taman Rekreasi</h1>
      <p>
          Kami ingin menginformasikan bahwa harga sewa perahu angsa di taman kami adalah <span class="highlight">Rp 5.000</span>. Nikmati pengalaman berperahu santai bersama keluarga dan teman-teman Anda di danau yang indah.
      </p>
      <p>
          Di Taman Kelinci, Anda dapat berinteraksi dengan kelinci-kelinci lucu kami. Namun, mohon diperhatikan bahwa kelinci-kelinci ini hanya tersedia pada hari-hari tertentu seperti hari libur panjang atau hari lebaran, ketika banyak pengunjung yang datang. Pastikan untuk memeriksa jadwal sebelum berkunjung.
      </p>
      <p>
          Kami juga ingin mengingatkan bahwa biaya kolam renang sudah termasuk dalam biaya masuk. Jadi, Anda dapat menikmati fasilitas kolam renang tanpa biaya tambahan.
      </p>
      <p>
          Jenis ikan di empang kami dapat bervariasi tergantung musimnya. Terkadang, ikan mungkin tidak tersedia karena kondisi musim. Kami mohon pengertian Anda terkait hal ini.
      </p>
      <div class="footer">
          Terima kasih atas perhatian dan pengertiannya. Kami berharap Anda menikmati waktu Anda di taman rekreasi kami.
      </div>
  </div>
</center>

<?php include_once 'layout/footer.php'?>