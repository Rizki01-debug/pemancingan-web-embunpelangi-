<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $nama_web = $_POST['nama_web'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $nama_ig = $_POST['nama_ig'];
    $link_ig = $_POST['link_ig'];
    $link_gmaps = $_POST['link_gmaps'];
    $alamat = $_POST['alamat'];

    // Direktori penyimpanan file
    $logo_path = '../../public/img/';
    $background_path = '../../public/img/';

    // Ekstensi yang diizinkan
    $allowed_extensions = array('jpg', 'jpeg', 'heic', 'webp', 'svg', 'png');

    // Cek apakah data sudah ada di tabel info_web
    $check_query = "SELECT * FROM info_web LIMIT 1";
    $result = mysqli_query($koneksi, $check_query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        // Jika data sudah ada, ambil nama file yang ada
        $logo_existing = $data['logo'];
        $background_existing = $data['gambar_beranda'];
    } else {
        $logo_existing = '';
        $background_existing = '';
    }

    // Penanganan upload logo
    if ($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logo_extension = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        if (!in_array($logo_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../dashboard.php");
            exit();
        }
        $logo_newname = time() . '_logo_' . basename($_FILES['logo']['name']);
        $logo_destinasi = $logo_path . $logo_newname;

        // Pindahkan file logo
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $logo_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah logo.";
            header("Location: ../dashboard.php");
            exit();
        }
    } else {
        // Gunakan file yang sudah ada jika tidak ada file baru yang diunggah
        $logo_newname = $logo_existing;
    }

    // Penanganan upload background gambar beranda
    if ($_FILES['gambar_beranda']['error'] === UPLOAD_ERR_OK) {
        $background_extension = strtolower(pathinfo($_FILES['gambar_beranda']['name'], PATHINFO_EXTENSION));
        if (!in_array($background_extension, $allowed_extensions)) {
            $_SESSION['error'] = "Format gambar tidak didukung. Gunakan format: JPG, JPEG, HEIC, WEBP, SVG, atau PNG.";
            header("Location: ../dashboard.php");
            exit();
        }
        $background_newname = time() . '_bg_' . basename($_FILES['gambar_beranda']['name']);
        $background_destinasi = $background_path . $background_newname;

        // Pindahkan file background gambar beranda
        if (!move_uploaded_file($_FILES['gambar_beranda']['tmp_name'], $background_destinasi)) {
            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah background gambar beranda.";
            header("Location: ../dashboard.php");
            exit();
        }
    } else {
        // Gunakan file yang sudah ada jika tidak ada file baru yang diunggah
        $background_newname = $background_existing;
    }

    if ($data) {
        // Jika data sudah ada, lakukan update
        $update_query = "UPDATE info_web SET 
                         nama_web='$nama_web', 
                         email='$email', 
                         telepon='$telepon', 
                         nama_ig='$nama_ig', 
                         link_ig='$link_ig', 
                         link_gmaps='$link_gmaps', 
                         alamat='$alamat', 
                         logo='$logo_newname', 
                         gambar_beranda='$background_newname'
                         WHERE id=(SELECT id FROM info_web LIMIT 1)";

        if (mysqli_query($koneksi, $update_query)) {
            $_SESSION['success'] = "Data Berhasil Diperbarui.";
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan Saat Memperbarui Data.";
            header("Location: ../dashboard.php");
            exit();
        }
    } else {
        // Jika data belum ada, lakukan insert
        $insert_query = "INSERT INTO info_web (nama_web, email, telepon, nama_ig, link_ig, link_gmaps, alamat, logo, gambar_beranda)
                         VALUES ('$nama_web', '$email', '$telepon', '$nama_ig', '$link_ig', '$link_gmaps', '$alamat', '$logo_newname', '$background_newname')";

        if (mysqli_query($koneksi, $insert_query)) {
            $_SESSION['success'] = "Data Berhasil Ditambahkan.";
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan Saat Menambahkan Data.";
            header("Location: ../dashboard.php");
            exit();
        }
    }
} else {
    echo 'Permintaan Tidak Valid'; // Selain method POST maka Tidak Valid
}

mysqli_close($koneksi);
?>
