<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $nama_ikan = $_POST['nama_ikan'];
    $deskripsi = $_POST['deskripsi'];

    // Direktori penyimpanan file
    $gambar_ikan_path = '../../public/img/';

    // Ekstensi yang diizinkan
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    // Penanganan upload gambar_ikan
    if ($_FILES['gambar_ikan']['error'] === UPLOAD_ERR_OK) {
        $gambar_ikan_extension = strtolower(pathinfo($_FILES['gambar_ikan']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_ikan_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-jenis-ikan.php");
            exit();
        }
        $gambar_ikan_newname = time() . '_gambar_ikan_' . basename($_FILES['gambar_ikan']['name']);
        $gambar_ikan_destinasi = $gambar_ikan_path . $gambar_ikan_newname;

        // Pindahkan file gambar_ikan
        if (!move_uploaded_file($_FILES['gambar_ikan']['tmp_name'], $gambar_ikan_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar Ikan.";
            header("Location: ../kelola-jenis-ikan.php");
            exit();
        }
    } else {
        // Jika tidak ada file baru yang diunggah
        $gambar_ikan_newname = '';
    }

    // Lakukan insert data baru ke tabel ikan
    $insert_query = "INSERT INTO ikan (nama_ikan, deskripsi, gambar_ikan)
                     VALUES ('$nama_ikan', '$deskripsi', '$gambar_ikan_newname')";

    if (mysqli_query($koneksi, $insert_query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan.";
        header("Location: ../kelola-jenis-ikan.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Menambahkan Data.";
        header("Location: ../kelola-jenis-ikan.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid'; // Selain method POST maka Tidak Valid
}

mysqli_close($koneksi);
?>
