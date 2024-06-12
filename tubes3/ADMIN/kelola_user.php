<?php
// Koneksi ke database
include './konfig.php';

// Query untuk mengambil data dari tabel kuliner
$query = "SELECT * FROM user";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Data User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include '../INCLUDE/nav.php' ;?>
    <div class="cont container-fluid">
    <div class="dashboard container-fluid">
        <h1 class="mt-4">Data User</h1>
        <a href="tambah_user.php" class="btn btn-warning mb-3">Tambah</a>
        <a href="admin.php" class="btn btn-warning mb-3">Kembali</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                 while ($row = mysqli_fetch_assoc($hasil)): ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= htmlspecialchars($row['username_user']) ?></td>
                    <td><?= htmlspecialchars($row['email_user']) ?></td>
                    <td>
                        <a href="edit_user.php?id_user=<?= htmlspecialchars($row['id_user']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_user.php?id_user=<?= htmlspecialchars($row['id_user']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
