<?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success" role="alert">
            <strong>Sip, Berhasil!</strong>
            <p class="mb-0 pb-0">'.$_SESSION['success'].'</p>
          </div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger" role="alert">
            <strong>Gagal!</strong>
            <p class="mb-0 pb-0">'.$_SESSION['error'].'</p>
          </div>';
    unset($_SESSION['error']);
}
?>