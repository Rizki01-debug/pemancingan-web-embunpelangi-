<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $delete_query = "DELETE FROM fasilitas WHERE id=$id";

    if (mysqli_query($koneksi, $delete_query)) {
        $_SESSION['success'] = "Data Berhasil Dihapus.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Menghapus Data.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid';
}

mysqli_close($koneksi);
?>