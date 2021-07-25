<?php
// INCLUDE KONEKSI KE DATABASE
include_once("config.php");

// AMBIL DATA DARI DATABASE BERDASARKAN DATA TERAKHIR DI INPUT
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
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
    </div>
  </div>
</nav>
		
		</nav>
		<table class="table" width='80%' border=0>

			<tr bgcolor='#CCCCCC'>
				<td>Nama</td>
				<td>Tipe</td>
				<td>Harga</td>
				<td>Qty</td>
				<td>Email</td>
				<td>Gambar</td>
				<td>Total</td>
				<td>Update</td>
			</tr>
			<?php

			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $res['nama'] . "</td>";
				echo "<td>" . $res['tipe'] . "</td>";
				echo "<td>" . $res['harga'] . "</td>";
				echo "<td>" . $res['qty'] . "</td>";
				echo "<td>" . $res['email'] . "</td>";
				echo "<td><img width='80' src='image/" . $res['gambar'] . "'</td>";
				echo "<td>" . $res['total'] . "</td>";}
			?>
		</table>
	</center>
</body>

</html>
