<?php
session_start();
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $link_yt = $_POST['link_yt'];
    $tentang_kami = $_POST['tentang_kami'];

    // Cek apakah data sudah ada di tabel info_web
    $check_query = "SELECT * FROM info_web LIMIT 1";
    $result = mysqli_query($koneksi, $check_query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        // Jika data sudah ada, lakukan update
        $update_query = "UPDATE info_web SET 
                         link_yt='$link_yt', 
                         tentang_kami='$tentang_kami'
                         WHERE id=(SELECT id FROM info_web LIMIT 1)";

        if (mysqli_query($koneksi, $update_query)) {
            $_SESSION['success'] = "Data Berhasil Diperbarui.";
            header("Location: ../kelola-tentang.php");
            exit();
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan Saat Memperbarui Data.";
            header("Location: ../kelola-tentang.php");
            exit();
        }
    } else {
        // Jika data belum ada, lakukan insert
        $insert_query = "INSERT INTO info_web (link_yt, tentang_kami)
                         VALUES ('$link_yt', '$tentang_kami')";

        if (mysqli_query($koneksi, $insert_query)) {
            $_SESSION['success'] = "Data Berhasil Ditambahkan.";
            header("Location: ../kelola-tentang.php");
            exit();
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan Saat Menambahkan Data.";
            header("Location: ../kelola-tentang.php");
            exit();
        }
    }
} else {
    echo 'Permintaan Tidak Valid'; // Selain method POST maka Tidak Valid
}

mysqli_close($koneksi);
?>
