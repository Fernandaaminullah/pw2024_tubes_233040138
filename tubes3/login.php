<?php
// Koneksi ke database
include './konfig.php';
session_start();

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];

    // Query untuk mendapatkan data pengguna
    $sql = "SELECT * FROM user WHERE username_user='$username_user'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password_user, $row['password_user'])) {
            // Password benar, buat sesi
            $_SESSION['username_user'] = $row['username_user'];
            header("Location: index.php");
            exit();
        } else {
            // Password salah
            $error = "Password salah!";
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
    <link rel="stylesheet" href="./asset/CSS/style2.css">
</head>
<body>
<div class="container-fluid login">
    <div class="content">
        <h1>Login User</h1>
        <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
    <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username_user" required placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password_user" required placeholder="Masukkan password">
            </div>
            <div class="button">
                <button type="submit" class="btn btn-dark">Login</button>
                <a href="./ADMIN/login.php" class="btn btn-dark">ADMIN</a>
                <p>Belum punya akun? <a href="./register.php">Daftar!</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
