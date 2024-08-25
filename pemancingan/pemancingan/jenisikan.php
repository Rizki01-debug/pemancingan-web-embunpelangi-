<?php 
$cssHalaman = '<link rel="stylesheet" href="assets/jenisikan.css">';
$active2 = 'class="active"';
require 'layout/header.php';
?>
    <!-- header -->

    <div class="ruang">
      <div class="container">
        <h1>Jenis Ikan</h1>
        <p class="sutitle">
        Kami menyediakan fasilitas memancing di kolam ikan yang menyenangkan dan penuh tantangan. 
        Pengunjung dapat memasak hasil tangkapan mereka di Kantin Embun Pelangi, di mana hidangan segar siap untuk dinikmati. 
        Jika Anda lebih suka membawa pulang hasil pancingan Anda, kami juga menyediakan opsi tersebut setelah pembayaran.
          </p>
      </div>
      </div>
        
    <!-- card -->
    <section>
      <div class="card-container">
      <?php
      $query = "SELECT * FROM ikan";
      $result = mysqli_query($koneksi, $query);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="card">
                  <div class="card-content">
                      <img src="public/img/<?php echo htmlspecialchars($row['gambar_ikan']); ?>" alt="Fasilitas 1">
                      <div class="text-container">
                          <h2 class="title"><?php echo htmlspecialchars($row['nama_ikan']); ?></h2>
                          <p class="subtitle">
                              <?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?>
                          </p>
                      </div>
                  </div>
              </div>
              <?php
          }
      } else {
          echo "Tidak ada data ikan yang ditemukan.";
      }
      ?>
      </div>
    </section>

    <!-- pengumuman -->
  <center>
    <div class="announcement-container">
      <h1>Pengumuman Penting Pemancingan</h1>
      <p>
          Kami ingin menginformasikan bahwa harga tukar ikan setelah selesai memancing adalah <span class="highlight">Rp 30.000</span>.
      </p>
      <p>
          Jika Anda ingin membawa pulang ikan yang Anda tangkap, akan dikenai biaya tambahan sesuai harga ikan yang ditangkap.
      </p>
      <p>
          Harap diperhatikan bahwa <span class="highlight">pancing wajib dibawa sendiri</span> karena pihak embun tidak menyediakan pancing.
      </p>
      <div class="footer">
          Terima kasih atas perhatian dan pengertiannya.
      </div>
  </div>
</center>

 
<?php include_once 'layout/footer.php'?>