<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $nama_menu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];

    // Direktori penyimpanan file
    $gambar_menu_path = '../../public/img/';

    // Ekstensi yang diizinkan
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    // Penanganan upload gambar_menu
    if ($_FILES['gambar_menu']['error'] === UPLOAD_ERR_OK) {
        $gambar_menu_extension = strtolower(pathinfo($_FILES['gambar_menu']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_menu_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-menu-kantin.php");
            exit();
        }
        $gambar_menu_newname = time() . '_gambar_menu_' . basename($_FILES['gambar_menu']['name']);
        $gambar_menu_destinasi = $gambar_menu_path . $gambar_menu_newname;

        // Pindahkan file gambar_menu
        if (!move_uploaded_file($_FILES['gambar_menu']['tmp_name'], $gambar_menu_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar kantin.";
            header("Location: ../kelola-menu-kantin.php");
            exit();
        }
    } else {
        // Jika tidak ada file baru yang diunggah
        $gambar_menu_newname = '';
    }

    // Lakukan insert data baru ke tabel kantin
    $insert_query = "INSERT INTO menu_kantin (nama_menu, kategori, gambar_menu)
                     VALUES ('$nama_menu', '$kategori', '$gambar_menu_newname')";

    if (mysqli_query($koneksi, $insert_query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan.";
        header("Location: ../kelola-menu-kantin.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Menambahkan Data.";
        header("Location: ../kelola-menu-kantin.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid'; // Selain method POST maka Tidak Valid
}

mysqli_close($koneksi);
?>
