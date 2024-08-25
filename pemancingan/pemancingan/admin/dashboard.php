<?php
    $cssHalaman = '
    <link rel="stylesheet" href="../assets/beranda.css">
    ';
    $active1 = 'class="bg-primary text-white"';
    require 'layout/header.php';
?>

    <!-- Main content -->
    <div class="content" id="content">
        <nav class="navbar navbar-light bg-light">
            <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="container mt-4">
            <?php include '_alert.php'; ?>
            <h2 class="mb-4">Kelola Web Dan Beranda</h2>
            <?php

            // Mendapatkan data yang ada dari database
            $query = "SELECT * FROM info_web LIMIT 1";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);

            $nama_web = isset($data['nama_web']) ? $data['nama_web'] : '';
            $email = isset($data['email']) ? $data['email'] : '';
            $telepon = isset($data['telepon']) ? $data['telepon'] : '';
            $nama_ig = isset($data['nama_ig']) ? $data['nama_ig'] : '';
            $link_ig = isset($data['link_ig']) ? $data['link_ig'] : '';
            $link_gmaps = isset($data['link_gmaps']) ? $data['link_gmaps'] : '';
            $alamat = isset($data['alamat']) ? $data['alamat'] : '';
            $logo = isset($data['logo']) ? $data['logo'] : 'no-image-kotak.webp';
            $gambar_beranda = isset($data['gambar_beranda']) ? $data['gambar_beranda'] : 'no-image-kotak.webp';            

            ?>

            <form action="proses/proses_simpan_beranda.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_web">Nama Web</label>
                    <input type="text" class="form-control" id="nama_web" name="nama_web" value="<?php echo $nama_web; ?>" placeholder="Masukkan Nama Web" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon; ?>" placeholder="Masukkan Telepon" required>
                </div>
                <div class="form-group">
                    <label for="nama_ig">Nama IG</label>
                    <input type="text" class="form-control" id="nama_ig" name="nama_ig" value="<?php echo $nama_ig; ?>" placeholder="Masukkan Nama IG" required>
                </div>
                <div class="form-group">
                    <label for="link_ig">Link IG</label>
                    <input type="text" class="form-control" id="link_ig" name="link_ig" value="<?php echo $link_ig; ?>" placeholder="Masukkan Link IG" required>
                </div>
                <div class="form-group">
                    <label for="link_gmaps">Link GMAPS</label>
                    <input type="text" class="form-control" id="link_gmaps" name="link_gmaps" value="<?php echo $link_gmaps; ?>" placeholder="Masukkan Link GMAPS" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <img src="../public/img/<?php echo $logo; ?>" alt="Logo" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <div class="form-group">
                    <img src="../public/img/<?php echo $gambar_beranda; ?>" alt="Background Gambar Beranda" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="backgroundGambar">Background Gambar Beranda</label>
                    <input type="file" class="form-control" id="backgroundGambar" name="gambar_beranda">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

<?php
    require 'layout/footer.php';
?>