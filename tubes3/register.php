<?php
// Koneksi ke database
include './konfig.php';

// Fungsi untuk melakukan hash pada password
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_user = $_POST['username_user'];
    $password_user = hash_password($_POST['password_user']);
    $email_user = $_POST['email_user'];

    // Query untuk insert data pengguna
    $sql = "INSERT INTO user (username_user, password_user, email_user) VALUES ('$username_user', '$password_user', '$email_user')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data Ditambahkan";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="./asset/CSS/style2.css">
    
</head>
<body>


<div class="container-fluid login">
    <div class="content" style="height: max-content;">
    <h1>Register User</h1>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="username_user">Username:</label><br>
        <input type="text" id="username_user" name="username_user" required><br>
        <label for="password_user">Password:</label><br>
        <input type="password" id="password_user" name="password_user" required><br>
        <label for="email_user">Email:</label><br>
        <input type="email" id="email_user" name="email_user" required><br>
        <div class="button">
        <button type="submit" class="btn btn-dark">Tambah Pengguna</button>
        <a href="login.php" class="btn btn-dark">Kembali</a>
        </div>
    </form>
    </div>
 
</body>
</html>
