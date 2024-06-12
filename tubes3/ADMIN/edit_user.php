<?php
// Koneksi ke database
include '../konfig.php';

?>

<?php

// Mendapatkan ID dari query string
$id = $_GET['id_user'];

// Mengambil data kuliner berdasarkan ID
$query = "SELECT * FROM user WHERE id_user = $id";
$hasil = mysqli_query($koneksi, $query);
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}
// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_user = $_POST['username_user'];
    $password_user= hash_password($_POST['password_user']);
    $email_user = $_POST['email_user']; // Asumsi nama file email_user disimpan sebagai text
    // Update data ke database
    $updateQuery = "UPDATE user SET username_user='$username_user', password_user='$password_user', email_user='$email_user' WHERE id_user=$id";
    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: admin.php"); // Redirect ke halaman admin
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kuliner</title>
</head>
<body>

<?php include '../INCLUDE/nav.php'; ?>
<link rel="stylesheet" href="../asset/CSS/style.css">

    <div class="container-fluid" style="min-height: 100vh; display:flex; place-content: center; flex-direction: column; text-align: center;">
    <h1>Edit Data User</h1>
    <br>
    <div class="container lg container-fluid" style="border: 1px solid white; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.9); padding: 20px;" >
    <form method="post" action="">
        <label for="username_user" class="form-label">USER</label><br>
        <input type="text" id="username_user" name="username_user" class="form-control"><br>
        <label for="password_user" class="form-label">password</label><br>
        <input type="password" id="password_user" name="password_user" class="form-control"><br>
        <label for="email_user" class="form-label">email:</label><br>
        <input type="text" id="email_user" name="email_user" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
    </div>
    </div>
</body>
</html>