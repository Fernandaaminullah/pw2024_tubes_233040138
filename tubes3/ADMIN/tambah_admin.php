<?php
// Koneksi ke database
include '../konfig.php';

// Fungsi untuk melakukan hash pada password
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_admin = $_POST['username_admin'];
    $password_admin = hash_password($_POST['password_admin']);

    // Query untuk insert data pengguna
    $sql = "INSERT INTO admin (username_admin, password_admin) VALUES ('$username_admin', '$password_admin')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data Ditambahkan";
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
</head>
<body>
<?php include '../INCLUDE/nav.php'; ?>

    <h1>Tambah admin</h1>
    <form action="tambah_admin.php" method="post">
        <label for="username_admin">Username:</label><br>
        <input type="text" id="username_admin" name="username_admin" required><br>
        <label for="password_admin">Password:</label><br>
        <input type="password" id="password_admin" name="password_admin" required><br>
        <input type="submit" value="Tambah admin">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>Pengguna berhasil ditambahkan. <a href="admin.php">Kembali ke Admin</a></p>
    <?php endif; ?>
</body>
</html>
