<?php
    $cssHalaman = '
    <link rel="stylesheet" href="../assets/menukantindashboard.css">
    ';
    $active4 = 'class="bg-primary text-white"';
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
            <h2 class="mb-4">Form Input Menu Kantin</h2>
            <form action="proses/proses_simpan_kantin.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_menu">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Salah Satu</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Soup">Soup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar_menu">Gambar Menu</label>
                    <input type="file" class="form-control" id="gambar_menu" name="gambar_menu">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php
            $query = "SELECT * FROM menu_kantin";
            $result = mysqli_query($koneksi, $query);
        ?>
        <div class="mt-4">
            <div class="card table">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Gambar Menu</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_menu']); ?></td>
                                    <td><img src="../public/img/<?php echo htmlspecialchars($row['gambar_menu']); ?>" alt="<?php echo htmlspecialchars($row['nama_menu']); ?>" width="100"></td>
                                    <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <button type="button" class="btn btn-warning w-100 fw-bold mr-2" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                                            <button type="button" class="btn btn-danger  w-100 fw-bold ml-2" data-toggle="modal" data-target="#deleteModal<?php echo $row['id']; ?>">Hapus</button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Menu Kantin</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_kantin.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="nama_menu<?php echo $row['id']; ?>" class="form-label">Nama Menu Kantin</label>
                                                        <input type="text" class="form-control" id="nama_menu<?php echo $row['id']; ?>" name="nama_menu" value="<?php echo htmlspecialchars($row['nama_menu']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kategori<?php echo $row['id']; ?>" class="form-label">Kategori</label>
                                                        <select class="form-control" id="kategori<?php echo $row['id']; ?>" name="kategori" required>
                                                            <option value="Makanan" <?php echo ($row['kategori'] == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
                                                            <option value="Minuman" <?php echo ($row['kategori'] == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
                                                            <option value="Soup" <?php echo ($row['kategori'] == 'Soup') ? 'selected' : ''; ?>>Soup</option>
                                                        </select>
                                                    </div>
                                                        <div class="mb-3 d-flex flex-column justify-content-center align-items-center">
                                                            <img src="../public/img/<?php echo htmlspecialchars($row['gambar_menu']); ?>" alt="<?php echo htmlspecialchars($row['nama_menu']); ?>" width="200">
                                                        </div>
                                                    <div class="mb-3">
                                                        <label for="gambar_menu<?php echo $row['id']; ?>" class="form-label">Gambar Menu Kantin</label>
                                                        <input type="file" class="form-control" id="gambar_menu<?php echo $row['id']; ?>" name="gambar_menu">
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo $row['id']; ?>">Hapus Menu Kantin</h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus Menu Kantin ini?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="proses/proses_hapus_kantin.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada data kantin yang ditemukan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    require 'layout/footer.php';
?>
