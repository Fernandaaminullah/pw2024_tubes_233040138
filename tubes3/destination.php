<?php 
require_once 'konfig.php';
$query = "SELECT * FROM kuliner WHERE kuliner_kategori='destinasi'";
$hasil = mysqli_query($koneksi, $query);
?>

<?php include 'INCLUDE/nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="asset/CSS/style.css">
  <style>

    body {
      background-image: url('asset/IMG/bg11.jpeg');
      background-size: cover;
      background-position: center;
    }
    
    .destination {
    display: flex;
    flex-wrap: wrap;
    gap : 20px;
    padding: 20vh;
    }
    
    .destination-card {
    width: 300px; /* Lebar tetap untuk setiap kartu */
    height: 400px; /* Tinggi tetap untuk setiap kartu */
    display: flex;
    flex-direction: column;
    margin: 10px; /* Tambahkan margin untuk sedikit ruang antar kartu */
    border: 1px solid white;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.9);
    padding: 10px;
    background-color: white;
    border-radius: 10px;
}

    .destination-body {
      flex-grow: 1; /* Mengizinkan body kartu mengambil ruang yang tersisa */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Menyebar konten di dalam body */
    padding: 10px;
    }

    .destination-card img {
      width: 100%; /* Lebar gambar menjadi 100% dari kontainer kartu */
    height: 200px; /* Tinggi gambar tetap, misalnya 200px */
    object-fit: cover; 
    border-radius: 10px;
    }

   .destination h1 {
    width: 100%; 
    text-align: center; 
    margin-bottom: 2rem; 
    color: white; 
    font-size: 2.5rem; 
    background-color: #101010;  
    padding: 10px;
    border: 1px solid white;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.9);
    border-radius: 10px;
}


.destination-body a {
  color: white;
}




  </style>
</head>
<body>


  
<div class="destination container-fluid">
<h1>Destinasi</h1>
<?php while ($row = mysqli_fetch_assoc($hasil)): ?>
<div class="destination-card" >
  <img src="./asset/IMG/<?= $row['kuliner_gambar']?>">
  <div class="destination-body">
    <h5 class="card-title"><?= htmlspecialchars($row['kuliner_kategori']) ?></h5>
    <p class="card-text"><?= htmlspecialchars($row['Kuliner_deskripsi']) ?></p>
    <a href="#" class="btn btn-dark">Go somewhere</a>
  </div>
  </div>
<?php endwhile; ?>
</div>

  
</body>
</html>




