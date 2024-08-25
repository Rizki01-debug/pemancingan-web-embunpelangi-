<?php
session_start();
require '../config/koneksi.php';

// Pengecekan apakah user sudah login
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Anda harus login terlebih dahulu.";
    header('Location: ../auth/login.php');
    exit();
}

// Mendapatkan username dari sesi
$username = $_SESSION['username'];

// Query untuk mendapatkan level user
$sql = "SELECT level FROM users WHERE username = '$username'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_level = $row['level'];

    // Pengecekan apakah level user adalah Admin
    if ($user_level !== 'Admin') {
        $_SESSION['error'] = "Anda tidak memiliki akses ke halaman ini.";
        header('Location: ../auth/login.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi.";
    header('Location: ../auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Table Beranda</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php echo $cssHalaman ?>
</head>
<body>

<?php
include_once 'menu.php';
?>
