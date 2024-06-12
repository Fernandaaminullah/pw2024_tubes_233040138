<?php
// Koneksi ke database
include '../konfig.php';

// Cek jika id_user tersedia dalam query string
if (isset($_GET['id_user']) && !empty($_GET['id_user'])) {
    // Mendapatkan nilai id_user dari query string
    $id_user = $_GET['id_user'];

    // Query untuk menghapus data berdasarkan id_user
    $sql = "DELETE FROM user WHERE id_user = $id_user";

    if ($koneksi->query($sql) === TRUE) {
        $message = "Data berhasil dihapus";
    } else {
        $message = "Error: " . $sql . "\\n" . $koneksi->error;
    }
} else {
    $message = "id_user tidak ditemukan";
}

// Menampilkan alert dan kembali ke halaman admin
echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'admin.php';
      </script>";
?>