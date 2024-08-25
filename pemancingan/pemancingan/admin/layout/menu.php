    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    <h4 class="text-center text-white">Admin Dashboard</h4><br>
        <a href="../home.php">Home</a>
        <a href="dashboard.php" <?php echo $active1 ?? '' ?>>Dashboard</a>
        <a href="kelola-jenis-ikan.php" <?php echo $active2 ?? '' ?>>Jenis Ikan</a>
        <a href="kelola-fasilitas.php" <?php echo $active3 ?? '' ?>>Fasilitas</a>
        <a href="kelola-menu-kantin.php" <?php echo $active4 ?? '' ?>>Menu Kantin</a>
        <a href="kelola-tentang.php" <?php echo $active5 ?? '' ?>>Tentang</a>
        <a href="../auth/logout.php" class="btn btn-danger mt-3 mx-3">Log Out</a>
    </div>