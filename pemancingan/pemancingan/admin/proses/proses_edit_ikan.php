<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_ikan = $_POST['nama_ikan'];
    $deskripsi = $_POST['deskripsi'];

    $gambar_ikan_path = '../../public/img/';
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    if ($_FILES['gambar_ikan']['error'] === UPLOAD_ERR_OK) {
        $gambar_ikan_extension = strtolower(pathinfo($_FILES['gambar_ikan']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_ikan_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-jenis-ikan.php");
            exit();
        }
        $gambar_ikan_newname = time() . '_gambar_ikan_' . basename($_FILES['gambar_ikan']['name']);
        $gambar_ikan_destinasi = $gambar_ikan_path . $gambar_ikan_newname;

        if (!move_uploaded_file($_FILES['gambar_ikan']['tmp_name'], $gambar_ikan_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar ikan.";
            header("Location: ../kelola-jenis-ikan.php");
            exit();
        }

        $gambar_ikan_query = ", gambar_ikan='$gambar_ikan_newname'";
    } else {
        $gambar_ikan_query = "";
    }

    $update_query = "UPDATE ikan SET nama_ikan='$nama_ikan', deskripsi='$deskripsi' $gambar_ikan_query WHERE id=$id";

    if (mysqli_query($koneksi, $update_query)) {
        $_SESSION['success'] = "Data Berhasil Diperbarui.";
        header("Location: ../kelola-jenis-ikan.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Memperbarui Data.";
        header("Location: ../kelola-jenis-ikan.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid';
}

mysqli_close($koneksi);
?>
