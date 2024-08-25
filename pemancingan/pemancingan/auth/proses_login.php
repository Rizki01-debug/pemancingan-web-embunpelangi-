<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi sederhana untuk memastikan username dan password diisi
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password harus diisi.";
        header('Location: login.php');
        exit();
    }

    // Escape string untuk menghindari SQL Injection
    $username = $koneksi->real_escape_string($username);

    // Memeriksa username dan password dari database
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Simpan sesi username
            $_SESSION['username'] = $username;

            // Redirect ke dashboard
            header('Location: ../admin/dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "Username atau password salah.";
        }
    } else {
        $_SESSION['error'] = "Username atau password salah.";
    }

    $koneksi->close();
    header('Location: login.php');
    exit();
} else {
    // Jika request bukan POST, kembalikan ke halaman login
    header('Location: login.php');
    exit();
}
?>
