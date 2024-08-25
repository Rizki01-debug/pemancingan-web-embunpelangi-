<?php
    $cssHalaman = '
    <link rel="stylesheet" href="../assets/tentangdashboard.css">
    ';
    $active5 = 'class="bg-primary text-white"';
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
            <h2 class="mb-4">Form Input Tentang</h2>
            <?php

            // Mendapatkan data yang ada dari database
            $query = "SELECT * FROM info_web LIMIT 1";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);

            $tentang_kami = isset($data['tentang_kami']) ? $data['tentang_kami'] : 'Masukkan Tentang Kami';
            $link_yt = isset($data['link_yt']) ? $data['link_yt'] : '';           

            ?>
            <form action="proses/proses_simpan_tentang.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tentang_kami">Tentang Kami</label>
                    <textarea class="form-control" id="tentang_kami" name="tentang_kami" rows="10" required><?php echo $tentang_kami; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="link_yt">Link YT (Embed)</label>
                    <input type="text" class="form-control" id="link_yt" name="link_yt" value="<?php echo $link_yt; ?>" placeholder="Masukkan Link YT" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?php
    require 'layout/footer.php';
?>

