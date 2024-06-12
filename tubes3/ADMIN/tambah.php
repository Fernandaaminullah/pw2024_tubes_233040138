<?php
// Koneksi ke database
include '../konfig.php';



// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kuliner_judul = $_POST['kuliner_judul'];
    $kuliner_kategori = $_POST['kuliner_kategori'];
    $Kuliner_deskripsi = $_POST['Kuliner_deskripsi'];
    $kuliner_url = $_POST['kuliner_url'];
    $kuliner_gambar = $_FILES['kuliner_gambar']['name']; // Asumsi nama file gambar disimpan sebagai text

    // Handle file upload
    if (is_uploaded_file($_FILES['kuliner_gambar']['tmp_name'])) {
        $target_dir = "../asset/IMG/";
        $target_file = $target_dir . basename($_FILES['kuliner_gambar']['name']);
        
        if (move_uploaded_file($_FILES['kuliner_gambar']['tmp_name'], $target_file)) {
            echo "<script>alert('File " . $_FILES['kuliner_gambar']['name'] . " upload berhasil.');</script>";

            // Query untuk insert data
            $sql = "INSERT INTO kuliner (kuliner_judul, kuliner_kategori, Kuliner_deskripsi,  kuliner_gambar, kuliner_url) VALUES ('$kuliner_judul', '$kuliner_kategori', '$Kuliner_deskripsi', '$kuliner_gambar', '$kuliner_url')";

            if ($koneksi->query($sql) === TRUE) {
                echo "<script>alert('Data Ditambahkan');</script>";
                header("Location: admin.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "<script>alert('Upload gagal');</script>";
        }
    } else {
        echo "Possible file upload attack: filename '". $_FILES['kuliner_gambar']['name'] . "'";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Tambah Data</title>
</head>

<body>
<?php include '../INCLUDE/nav.php'; ?>
<link rel="stylesheet" href="../asset/CSS/style.css">

<div class="container-fluid" style="min-height: 100vh; display:flex; place-content: center; flex-direction: column; text-align: center;">
    <h1>Proses Penambahan Data</h1>
    <br>
    <div class="container-lg container-fluid" style="border: 1px solid white; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.9); padding: 20px;">
    <form action="tambah.php" method    
    ="post" enctype="multipart/form-data">
        <label for="kuliner_judul" class="form-label">Judul Kuliner:</label><br>
        <input type="text" id="kategori" name="kuliner_judul" class="form-control" required><br>
        <label for="kategori" class="from-label">Kategori Kuliner:</label><br>
        <input type="text" id="kategori" name="kuliner_kategori" class="form-control" required><br>
        <label for="deskripsi" class="form-label">Deskripsi Kuliner:</label><br>
        <textarea id="deskripsi" name="Kuliner_deskripsi" class="form-control" required></textarea><br>
        <label for="kuliner_url" class="form-label">Kuliner URL:</label><br>
        <input type="text" id="kuliner_url" name="kuliner_url" class="form-control" required> <br>
        <label for="kuliner_gambar" class="form-label">URL Gambar:</label><br>
        <input type="file" id="kuliner_gambar" name="kuliner_gambar" class="form-control" required><br>
        <input type="submit" value="Tambah Data" class="btn btn-primary">
    </form>
    </div>
    </div>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>Data berhasil ditambahkan. <a href="admin.php">Kembali ke Admin</a></p>
    <?php endif; ?>
</body>
</html>