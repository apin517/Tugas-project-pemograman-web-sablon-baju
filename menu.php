<?php
// INCLUDE KONEKSI KE DATABASE
include_once("config.php");

// AMBIL DATA DARI DATABASE BERDASARKAN DATA TERAKHIR DI INPUT
$result = mysqli_query($mysqli, "SELECT * FROM sablon ORDER BY id DESC");
?>

<html>

<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="css\bootstrap.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">E-ClothPrinter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
          <a class="nav-item nav-link" href="menu.php">HOME</a>
          <a class="nav-item nav-link" href="add.html">ORDER</a>
          <a class="nav-item nav-link" href="galery.php">GALERI</a>
          <a class="nav-item nav-link" href="keranjang.php">KERANJANG</a>
      <a class="nav-item nav-link" href="index.php">logout</a>
    </div>
  </div>
</nav>
<div class="jumbotron p-3 p-md-5 text-white bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>
      
      <div class="row mb-2">
      <?php

while ($res = mysqli_fetch_array($result)) {
    echo "<div class='col-md-6'>";
    echo "<div class='card flex-md-row mb-4 box-shadow h-md-250'>";
    echo "<div class='card-body d-flex flex-column align-items-start'>";
    echo "<strong class='d-inline-block mb-2 text-primary'>Sablon</strong>";
    echo "<h3 class='mb-0'>";
    echo "<a class='text-dark'>" . $res['nama'] . "</a>";
    echo "</h3>";
    echo "<div class='mb-1 text-muted'> Rp. " . $res['harga'] . "</div>";
    echo "<p class='card-text mb-auto'>" . $res['keterangan'] . "</p>";
    echo "<a href='add.html'>Order</a>";
    echo "</div>";
    echo "<img class='card-img-right flex-auto d-none d-md-block' data-src='holder.js/200x250?theme=thumb' alt='Thumbnail [200x250]' style='width: 200px; height: 250px;' src='image/" . $res['gambar'] . "'</td>";
    echo "</div>";
    echo "</div>";}
?>
      </div>
</body>

</html>
