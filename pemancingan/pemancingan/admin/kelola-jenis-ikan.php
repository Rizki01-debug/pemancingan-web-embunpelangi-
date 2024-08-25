<?php
    $cssHalaman = '
    <link rel="stylesheet" href="../assets/jenisikandashboard.css">
    ';
    $active2 = 'class="bg-primary text-white"';
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
            <h2 class="mb-4">Form Input Jenis Ikan</h2>
            <form action="proses/proses_simpan_ikan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_ikan">Nama Ikan</label>
                    <input type="text" class="form-control" id="nama_ikan" name="nama_ikan" placeholder="Masukkan Nama Ikan" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" required>Masukkan Deskripsi Ikan</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar_ikan">Gambar Ikan</label>
                    <input type="file" class="form-control" id="gambar_ikan" name="gambar_ikan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <?php
                $query = "SELECT * FROM ikan";
                $result = mysqli_query($koneksi, $query);
            ?>
            <div class="mt-4">
                <div class="card table">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ikan</th>
                                <th>Gambar Ikan</th>
                                <th>Deskripsi</th>
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
                                        <td><?php echo htmlspecialchars($row['nama_ikan']); ?></td>
                                        <td><img src="../public/img/<?php echo htmlspecialchars($row['gambar_ikan']); ?>" alt="<?php echo htmlspecialchars($row['nama_ikan']); ?>" width="100"></td>
                                        <td><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></td>
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
                                                    <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Ikan</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="proses/proses_edit_ikan.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <div class="mb-3">
                                                            <label for="nama_ikan<?php echo $row['id']; ?>" class="form-label">Nama Ikan</label>
                                                            <input type="text" class="form-control" id="nama_ikan<?php echo $row['id']; ?>" name="nama_ikan" value="<?php echo htmlspecialchars($row['nama_ikan']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi<?php echo $row['id']; ?>" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi<?php echo $row['id']; ?>" name="deskripsi" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
                                                        </div>
                                                            <div class="mb-3 d-flex flex-column justify-content-center align-items-center">
                                                                <img src="../public/img/<?php echo htmlspecialchars($row['gambar_ikan']); ?>" alt="<?php echo htmlspecialchars($row['nama_ikan']); ?>" width="200">
                                                            </div>
                                                        <div class="mb-3">
                                                            <label for="gambar_ikan<?php echo $row['id']; ?>" class="form-label">Gambar Ikan</label>
                                                            <input type="file" class="form-control" id="gambar_ikan<?php echo $row['id']; ?>" name="gambar_ikan">
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
                                                    <h5 class="modal-title" id="deleteModalLabel<?php echo $row['id']; ?>">Hapus Jenis Ikan</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus jenis ikan ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="proses/proses_hapus_ikan.php" method="post">
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
                                echo "<tr><td colspan='5'>Tidak ada data ikan yang ditemukan.</td></tr>";
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

