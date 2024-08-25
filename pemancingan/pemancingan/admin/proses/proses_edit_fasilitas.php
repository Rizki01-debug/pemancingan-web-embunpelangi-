<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    $gambar_fasilitas_path = '../../public/img/';
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    if ($_FILES['gambar_fasilitas']['error'] === UPLOAD_ERR_OK) {
        $gambar_fasilitas_extension = strtolower(pathinfo($_FILES['gambar_fasilitas']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_fasilitas_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-fasilitas.php");
            exit();
        }
        $gambar_fasilitas_newname = time() . '_gambar_fasilitas_' . basename($_FILES['gambar_fasilitas']['name']);
        $gambar_fasilitas_destinasi = $gambar_fasilitas_path . $gambar_fasilitas_newname;

        if (!move_uploaded_file($_FILES['gambar_fasilitas']['tmp_name'], $gambar_fasilitas_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar Fasilitas.";
            header("Location: ../kelola-fasilitas.php");
            exit();
        }

        $gambar_fasilitas_query = ", gambar_fasilitas='$gambar_fasilitas_newname'";
    } else {
        $gambar_fasilitas_query = "";
    }

    $update_query = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas', deskripsi='$deskripsi' $gambar_fasilitas_query WHERE id=$id";

    if (mysqli_query($koneksi, $update_query)) {
        $_SESSION['success'] = "Data Berhasil Diperbarui.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Memperbarui Data.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid';
}

mysqli_close($koneksi);
?>
