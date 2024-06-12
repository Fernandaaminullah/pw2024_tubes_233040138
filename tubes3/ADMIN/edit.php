<?php
// Koneksi ke database
include '../konfig.php';

?>

<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040138");

// Mendapatkan ID dari query string
$id = $_GET['kuliner_id'];

// Mengambil data kuliner berdasarkan ID
$query = "SELECT * FROM kuliner WHERE kuliner_id = $id";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar']; // Asumsi nama file gambar disimpan sebagai text

    // Update data ke database
    $updateQuery = "UPDATE kuliner SET kuliner_kategori='$kategori', kuliner_deskripsi='$deskripsi', kuliner_gambar='$gambar' WHERE kuliner_id=$id";
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
    <h1>Edit Data Kuliner</h1>
    <br>
    <div class="container lg container-fluid" style="border: 1px solid white; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.9); padding: 20px;" >
    <form method="post">
        <label for="kategori" class="form-label">Kategori Kuliner:</label><br>
        <input type="text" id="kategori" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kuliner_kategori']) ?>"><br>
        <label for="deskripsi" class="form-label">Deskripsi Kuliner:</label><br>
        <textarea id="deskripsi" name="deskripsi" class="form-control"><?= htmlspecialchars($data['Kuliner_deskripsi']) ?></textarea><br>
        <label for="gambar" class="form-label">URL Gambar:</label><br>
        <input type="text" id="gambar" name="gambar" class="form-control" value="<?= htmlspecialchars($data['kuliner_gambar']) ?>"><br>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
    </div>
    </div>
</body>
</html>