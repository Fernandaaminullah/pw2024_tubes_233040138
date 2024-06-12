
<?php
require_once '../konfig.php';
?>


<?php
    // Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_admin = $_POST['username_admin'];
    $password_admin = $_POST['password_admin'];

    // Query untuk mendapatkan data pengguna
    $sql = "SELECT * FROM admin WHERE username_admin='$username_admin'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password_admin, $row['password_admin'])) {
            // Password benar, buat sesi
            $_SESSION['username_admin'] = $row['username_admin'];
            header("Location: admin.php");
            exit();
        } else {
            // Password salah
            $error = "Password salah!";
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan!";
    }};   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/CSS/style2.css">
</head>
<body>
    <div class="container-fluid login">
        <div class="content">
    <h1>Login Admin</h1>
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
    <?php endif; ?>
    <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username_admin" required placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password_admin" required placeholder="Masukkan password">
            </div>
            <div class="button">
            <button type="submit" class="btn btn-dark">Login</button>
            <a href="../login.php" class="btn btn-dark">USER</a>
        </form>
        </div>
        
    </div>

</body>
</html>