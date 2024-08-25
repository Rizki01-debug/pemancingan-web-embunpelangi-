<?php 
$cssHalaman = '<link rel="stylesheet" href="assets/menukantin.css">';
$active4 = 'class="active"';
require 'layout/header.php';
?>

<!-- header -->
<div class="ruang">
  <div class="container">
    <h1>Menu Kantin</h1>
    <p class="sutitle">
      Selain memiliki fasilitas yang mumpuni, kami juga menawarkan layanan reservasi makanan dan minuman di Kantin Embun Pelangi. 
      Ini adalah tempat yang sempurna bagi para pengunjung untuk menikmati santapan lezat sambil menikmati keindahan alam. Di sini, kami menyediakan berbagai menu utama yang telah kami persiapkan dengan teliti untuk memenuhi selera Anda.
    </p>
  </div>
  </div>

   <!-- card -->
 <section>
  <h2 class="text-header">Makanan</h3>

  <?php

    $query_makanan = "SELECT * FROM menu_kantin WHERE kategori = 'Makanan'";
    $result_makanan = mysqli_query($koneksi, $query_makanan);

    if (mysqli_num_rows($result_makanan) > 0) {
        echo '<div class="card-container">';
        while ($row = mysqli_fetch_assoc($result_makanan)) {
            ?>
            <div class="card">
                <div class="card-content">
                    <img src="public/img/<?php echo htmlspecialchars($row['gambar_menu']); ?>" alt="<?php echo htmlspecialchars($row['nama_menu']); ?>">
                    <div class="text-container">
                        <h2 class="title"><?php echo htmlspecialchars($row['nama_menu']); ?></h2>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo "<p style='text-align:center;'>Tidak ada data menu kantin pada kategori makanan yang ditemukan.</p>";
    }

  ?>
</section>

    <section>
    <h2 class="text-header">Minuman</h3>
    <?php

    $query_minuman = "SELECT * FROM menu_kantin WHERE kategori = 'Minuman'";
    $result_minuman = mysqli_query($koneksi, $query_minuman);

    if (mysqli_num_rows($result_minuman) > 0) {
        echo '<div class="card-container">';
        while ($row = mysqli_fetch_assoc($result_minuman)) {
            ?>
            <div class="card">
                <div class="card-content">
                    <img src="public/img/<?php echo htmlspecialchars($row['gambar_menu']); ?>" alt="<?php echo htmlspecialchars($row['nama_menu']); ?>">
                    <div class="text-container">
                        <h2 class="title"><?php echo htmlspecialchars($row['nama_menu']); ?></h2>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo "<p style='text-align:center;'>Tidak ada data menu kantin pada kategori minuman yang ditemukan.</p>";
    }

    ?>
    </section>

    <section>
      <h2 class="text-header">Soup</h3>
      <?php

      $query_soup = "SELECT * FROM menu_kantin WHERE kategori = 'Soup'";
      $result_soup = mysqli_query($koneksi, $query_soup);

      if (mysqli_num_rows($result_soup) > 0) {
          echo '<div class="card-container">';
          while ($row = mysqli_fetch_assoc($result_soup)) {
              ?>
              <div class="card">
                  <div class="card-content">
                      <img src="public/img/<?php echo htmlspecialchars($row['gambar_menu']); ?>" alt="<?php echo htmlspecialchars($row['nama_menu']); ?>">
                      <div class="text-container">
                          <h2 class="title"><?php echo htmlspecialchars($row['nama_menu']); ?></h2>
                      </div>
                  </div>
              </div>
              <?php
          }
          echo '</div>';
      } else {
          echo "<p style='text-align:center;'>Tidak ada data menu kantin pada kategori soup yang ditemukan.</p>";
      }

      ?>
        </section>

<!-- pengumuman -->

 <center>
<div class="announcement-container">
  <h1>Pengumuman Harga Makanan dan Minuman</h1>
  <p>
      Mohon diperhatikan bahwa harga makanan dan minuman di Kantin Embun Pelangi dapat berubah tergantung pada hari atau musimnya.
  </p>
  <p>
      Kami berusaha untuk memberikan harga yang stabil dan terjangkau kepada para pengunjung kami. Namun, terkadang penyesuaian harga diperlukan sesuai dengan kondisi pasar dan ketersediaan bahan baku.
  </p>
  <p>
      Kami selalu berkomitmen untuk memberikan layanan terbaik kepada Anda dan memastikan pengalaman kuliner yang memuaskan di Kantin Embun Pelangi.
  </p>
  <div class="footer">
      Terima kasih atas pengertian dan dukungan Anda.
  </div>
</div>
</center>

<?php include_once 'layout/footer.php'?>