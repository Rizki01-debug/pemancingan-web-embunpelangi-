<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];

    $gambar_menu_path = '../../public/img/';
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    if ($_FILES['gambar_menu']['error'] === UPLOAD_ERR_OK) {
        $gambar_menu_extension = strtolower(pathinfo($_FILES['gambar_menu']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_menu_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-menu-kantin.php");
            exit();
        }
        $gambar_menu_newname = time() . '_gambar_menu_' . basename($_FILES['gambar_menu']['name']);
        $gambar_menu_destinasi = $gambar_menu_path . $gambar_menu_newname;

        if (!move_uploaded_file($_FILES['gambar_menu']['tmp_name'], $gambar_menu_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar Menu Kantin.";
            header("Location: ../kelola-menu-kantin.php");
            exit();
        }

        $gambar_menu_query = ", gambar_menu='$gambar_menu_newname'";
    } else {
        $gambar_menu_query = "";
    }

    $update_query = "UPDATE menu_kantin SET nama_menu='$nama_menu', kategori='$kategori' $gambar_menu_query WHERE id=$id";

    if (mysqli_query($koneksi, $update_query)) {
        $_SESSION['success'] = "Data Berhasil Diperbarui.";
        header("Location: ../kelola-menu-kantin.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Memperbarui Data.";
        header("Location: ../kelola-menu-kantin.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid';
}

mysqli_close($koneksi);
?>
