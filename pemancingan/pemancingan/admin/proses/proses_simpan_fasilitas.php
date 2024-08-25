<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    // Direktori penyimpanan file
    $gambar_fasilitas_path = '../../public/img/';

    // Ekstensi yang diizinkan
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    // Penanganan upload gambar_fasilitas
    if ($_FILES['gambar_fasilitas']['error'] === UPLOAD_ERR_OK) {
        $gambar_fasilitas_extension = strtolower(pathinfo($_FILES['gambar_fasilitas']['name'], PATHINFO_EXTENSION));
        if (!in_array($gambar_fasilitas_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../kelola-fasilitas.php");
            exit();
        }
        $gambar_fasilitas_newname = time() . '_gambar_fasilitas_' . basename($_FILES['gambar_fasilitas']['name']);
        $gambar_fasilitas_destinasi = $gambar_fasilitas_path . $gambar_fasilitas_newname;

        // Pindahkan file gambar_fasilitas
        if (!move_uploaded_file($_FILES['gambar_fasilitas']['tmp_name'], $gambar_fasilitas_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah Gambar fasilitas.";
            header("Location: ../kelola-fasilitas.php");
            exit();
        }
    } else {
        // Jika tidak ada file baru yang diunggah
        $gambar_fasilitas_newname = '';
    }

    // Lakukan insert data baru ke tabel fasilitas
    $insert_query = "INSERT INTO fasilitas (nama_fasilitas, deskripsi, gambar_fasilitas)
                     VALUES ('$nama_fasilitas', '$deskripsi', '$gambar_fasilitas_newname')";

    if (mysqli_query($koneksi, $insert_query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi Kesalahan Saat Menambahkan Data.";
        header("Location: ../kelola-fasilitas.php");
        exit();
    }
} else {
    echo 'Permintaan Tidak Valid'; // Selain method POST maka Tidak Valid
}

mysqli_close($koneksi);
?>
