<?php
session_start();
require"../config/koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
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

            <h2 class="text-center mb-4">Admin Login</h2>
            <form action="proses_login.php" method="POST" id="loginForm">
                <div class="mb-3">
                    <label for="username" class="form-label" >Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                    <div class="error-message" id="usernameError">Username is required.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                    <div class="error-message" id="passwordError">Password is required.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <button class="btn btn-secondary w-100 mt-3" onclick="goToHome()"><a href="../dashboard.php">Kembali ke Beranda</a></button>
        </div>
    </div>

    <script>
        function login() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var isValid = true;

            if (!username) {
                document.getElementById('usernameError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('usernameError').style.display = 'none';
            }

            if (!password) {
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('passwordError').style.display = 'none';
            }

            if (isValid) {
                alert('Login successful!\nUsername: ' + username + '\nPassword: ' + password);
            }
        }

        function goToHome() {
            window.location.href = 'index.html'; // Adjust the path as necessary
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
