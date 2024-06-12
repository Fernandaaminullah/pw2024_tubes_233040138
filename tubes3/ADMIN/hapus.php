<?php
// Koneksi ke database
include '../konfig.php';

// Cek jika kuliner_id tersedia dalam query string
if (isset($_GET['kuliner_id']) && !empty($_GET['kuliner_id'])) {
    // Mendapatkan nilai kuliner_id dari query string
    $kuliner_id = $_GET['kuliner_id'];

    // Query untuk menghapus data berdasarkan kuliner_id
    $sql = "DELETE FROM kuliner WHERE kuliner_id = $kuliner_id";

    if ($koneksi->query($sql) === TRUE) {
        $message = "Data berhasil dihapus";
    } else {
        $message = "Error: " . $sql . "\\n" . $koneksi->error;
    }
} else {
    $message = "kuliner_id tidak ditemukan";
}

// Menampilkan alert dan kembali ke halaman admin
echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'admin.php';
      </script>";
?>
