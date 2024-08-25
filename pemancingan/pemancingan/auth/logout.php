<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Jika ingin menghapus sesi cookie juga
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Alihkan pengguna kembali ke halaman login
header('Location: login.php');
exit();
?>
