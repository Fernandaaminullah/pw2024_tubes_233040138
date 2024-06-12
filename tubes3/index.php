<?php
session_start();
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040138");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit();
}

// Query untuk mengambil data teratas dari setiap kategori kuliner
$query = "SELECT * FROM (
  (SELECT * FROM kuliner WHERE kuliner_kategori='makanan' ORDER BY kuliner_id DESC LIMIT 1)
  UNION
  (SELECT * FROM kuliner WHERE kuliner_kategori='minuman' ORDER BY kuliner_id DESC LIMIT 1)
  UNION
  (SELECT * FROM kuliner WHERE kuliner_kategori='destinasi' ORDER BY kuliner_id DESC LIMIT 1)
) AS kuliner_teratas ORDER BY kuliner_id DESC";
$hasil = mysqli_query($koneksi, $query);

// Cek jika query berhasil
if (!$hasil) {
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/CSS/style.css">
</head>
<body>
    <?php include 'INCLUDE/nav.php'; ?>      
<section class="hero" id="home">
        <div class="content container-fluid">
            <h1>Culinary Of  Bandung</h1>
            <p>Temukan kuliner kuliner menarik di Bandung!</p>
        </div>
    </section>

    <section class="about" id="about">
    <div class="about container mt-5">
        <h1>Kuliner Bandung</h1>
        <p>Bandung tidak hanya terkenal dengan keindahan alamnya, tetapi juga kekayaan kuliner yang memanjakan lidah.</p>
        <div class="row justify-content-center">
            <div class="col-lg-4 d-flex justify-content-center">
                <div class="about-card">
                    <img src="./asset/IMG/gedung_sate.jpeg" class="img-about" alt="" style="border-radius: 40px;">
                </div>
            </div>
        </div>
    </div>
</section>


    <div class="kategori container-fluid" id="category">
    <h1>Kategori</h1>
    <div class="container mt-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($hasil)): ?>
        <div class="col-md-4">
            <div class="kategori-card" style="width: 18rem;">
            <div class="border">
                <img src="./asset/IMG/<?= htmlspecialchars($row['kuliner_gambar']) ?>" class="card-img-top" alt="Gambar Kuliner">
                </div>
                <div class="kategori-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['kuliner_kategori']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['Kuliner_deskripsi']) ?></p>
                    <a href="<?= htmlspecialchars($row['kuliner_url']) ?>" class="btn btn-dark">Lihat Detail</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
    </div>
    <?php include 'INCLUDE/footer.php'; 
    ?>  

  

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>