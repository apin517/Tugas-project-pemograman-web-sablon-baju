<?php
// INCLUDE KONEKSI KE DATABASE
include_once("config.php");

if (isset($_POST['update'])) {

	// AMBIL ID DATA
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	// AMBIL NAMA FILE FOTO SEBELUMNYA
	$data = mysqli_query($mysqli, "SELECT gambar FROM users WHERE id='$id'");
	$dataImage = mysqli_fetch_assoc($data);
	$oldImage = $dataImage['gambar'];

	// AMBIL DATA DATA DIDALAM INPUT
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$tipe = mysqli_real_escape_string($mysqli, $_POST['tipe']);
	$harga = mysqli_real_escape_string($mysqli, $_POST['harga']);
	$qty = mysqli_real_escape_string($mysqli, $_POST['qty']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$filename = $_FILES['newImage']['name'];
	$total = mysqli_real_escape_string($mysqli, $_POST['total']);

	// CEK DATA TIDAK BOLEH KOSONG
	if (empty($nama) || empty($qty) || empty($email)) {

		if (empty($nama)) {
			echo "<font color='red'>Kolom Nama tidak boleh kosong.</font><br/>";
		}

		if (empty($qty)) {
			echo "<font color='red'>Kolom qty tidak boleh kosong.</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>Kolom Email tidak boleh kosong.</font><br/>";
		}
	} else {

		// JIKA FOTO DI GANTI
		if (!empty($filename)) {
			$filetmpname = $_FILES['newImage']['tmp_name'];
			$folder = "image/";

			// GAMBAR LAMA DI DELETE
			unlink($folder . $oldImage) or die("GAGAL");

			// GAMBAR BARU DI MASUKAN KE FOLDER
			move_uploaded_file($filetmpname, $folder . $filename);

			// NAMA FILE FOTO + DATA YANG DI GANTIBARU DIMASUKAN
			$result = mysqli_query($mysqli, "UPDATE users SET nama='$nama',tipe='$tipe',harga='$harga',qty='$qty',email='$email',gambar='$filename',total='$total' WHERE id=$id");
		}

		// MEMASUKAN DATA YANG DI UPDATE KECUALI GAMBAR
		$result = mysqli_query($mysqli, "UPDATE users SET nama='$nama',tipe='$tipe',harga='$harga',qty='$qty',email='$email',total='$total' WHERE id=$id");

		// REDIRECT KE HALAMAN INDEX.PHP
		header("Location: admin.php");
	}
}
?>
<?php
// AMBIL ID DARI URL
$id = $_GET['id'];

// AMBIL DATA BERDASARKAN ID
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$name = $res['nama'];
	$type = $res['tipe'];
	$price = $res['harga'];
	$age = $res['qty'];
	$email = $res['email'];
	$image = $res['gambar'];
	$tot = $res['total'];
}
?>
<html>

<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="css\bootstrap.css">
</head>

<body>
	<center>
		<script>
  function CariHarga(){
  var harga=0;
  var tipe = document.getElementById("tipe").value;

  if(tipe == "Plastisol"){
    harga = 15000;
  }
  else if(tipe == "Rubber"){
    harga = 12000;
  }
  else if(tipe == "GlowInTheDark"){
    harga = 25000;
  }
  else if(tipe == "Foam"){
    harga = 17000;
  }
  else if(tipe == "Premium"){
    harga = 5000;
  }
  else{
    harga = 0;
  }
  document.getElementById("harga").value = harga;
  }
  function CariTotal(){
    var total = 0;
    var harga = document.getElementById("harga").value;
    var qty = document.getElementById("qty").value;
    var total = harga * qty;
    document.getElementById("total").value = total;
  }
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ADMINISTRATOR Edit Order</a>
</nav>

		<form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
			<table border="0">
				<tr>
					<td><label for="nama">Nama</label>
		  <input class="form-control" type="text" name="nama" value="<?php echo $name; ?>"/></td>
				</tr>
				<tr>
				<td>
					<label for="tipe">Jenis Sablon</label>
					<select class="custom-select d-block w-100" name="tipe" id="tipe" onchange="CariHarga(),CariTotal()">
					<option value="-">-Pilih Jenis Sablon</option>
					<option value="Plastisol">Plastisol</option>
					<option value="Rubber">Rubber</option>
					<option value="GlowInTheDark">Glow In The Dark</option>
					<option value="Foam">Foam</option>
					<option value="Premium">Premium</option>
				</select></td>
				</tr>
				<tr>
				<td><div class="mb-3">
					<label for="harga">Harga</label>
					<input type="number" class="form-control" id="harga" name="harga" value="<?php echo $price; ?>" readonly></td>
				</tr>
				<tr>
				<td><div class="mb-3">
					<label for="Qty">QTY</label>
					<input type="number" class="form-control" id="qty" name="qty" value="<?php echo $age; ?>" onchange="CariTotal()">
				</tr>
				<tr>
				<td><div class="mb-3">
					<label for="email">Email <span class="text-muted">(Optional)</span></label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="you@example.com"></td>
				</tr>
				<tr>
					<td><img width="80" src="image/<?php echo $image ?>"><input class="btn btn-secondary" type="file" name="newImage"></td>
				</tr>
				<tr><td><div class="mb-3">
            <label for="total">Total <span class="text-muted">(Order-Total)</span></label>
            <input type="number" class="form-control" id="total" name="total" placeholder="0" value="<?php echo $tot; ?>" readonly></td>
        </tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</center>
</body>

</html>
