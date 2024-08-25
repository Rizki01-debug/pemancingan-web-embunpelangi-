    <!-- nav -->
    <nav>
        <img src="public/img/<?php echo htmlspecialchars($logoI); ?>" alt="Logo">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li><a <?php echo $active1 ?? ''?> href="home.php">Beranda</a></li>
            <li><a <?php echo $active2 ?? ''?> href="jenisikan.php">Jenis ikan</a></li>
            <li><a <?php echo $active3 ?? ''?> href="fasilitas.php">Fasilitas</a></li>
            <li><a <?php echo $active4 ?? ''?> href="menukantin.php">Menu kantin</a></li>
            <li><a <?php echo $active5 ?? ''?> href="tentang.php">Tentang</a></li>
            <li>
                <?php if (isset($_SESSION['username'])): ?>
                    <a <?php echo $active6 ?? '' ?> href="admin/dashboard.php" class="login-kasir">Dashboard</a>
                <?php else: ?>
                    <a <?php echo $active6 ?? '' ?> href="auth/login.php" class="login-kasir">Login Admin</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>