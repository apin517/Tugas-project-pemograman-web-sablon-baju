<html>

<head>
	<title>Tambah Data</title>
</head>

<body>
	<?php
	// INCLUDE KONEKSI KE DATABASE
	include_once("config.php");

	if (isset($_POST['save'])) {
		$filename = $_FILES['gambar']['name'];
		$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
		$ket = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
		$harga = mysqli_real_escape_string($mysqli, $_POST['harga']);

		// CEK DATA TIDAK BOLEH KOSONG
		if (empty($nama) || empty($ket) || empty($harga) || empty($filename)) {


			if (empty($filename)) {
				echo "<font color='red'>Kolom Gambar tidak boleh kosong.</font><br/>";
			}
			if (empty($nama)) {
				echo "<font color='red'>Kolom Nama tidak boleh kosong.</font><br/>";
			}
			if (empty($ket)) {
				echo "<font color='red'>Kolom Tipe tidak boleh kosong.</font><br/>";
			}

			if (empty($harga)) {
				echo "<font color='red'>Kolom Email tidak boleh kosong.</font><br/>";
			}

			// KEMBALI KE HALAMAN SEBELUMNYA
			echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
		} else {
			// JIKA SEMUANYA TIDAK KOSONG
			$filetmpname = $_FILES['gambar']['tmp_name'];

			// FOLDER DIMANA GAMBAR AKAN DI SIMPAN
			$folder = 'image/';
			// GAMBAR DI SIMPAN KE DALAM FOLDER
			move_uploaded_file($filetmpname, $folder . $filename);

			// MEMASUKAN DATA DATA + NAMA GAMBAR KE DALAM DATABASE
			$result = mysqli_query($mysqli, "INSERT INTO sablon(gambar,nama,keterangan,harga) VALUES( '$filename', '$nama', '$ket', '$harga')");
			// $result = mysqli_query($mysqli, "INSERT INTO users(nama,tipe,harga,qty,email,gambar,total) VALUES('$nama', '$tipe', '$harga', '$qty', '$email', '$filename', '$total')");
            
            var_dump($result);
			// MENAMPILKAN PESAN BERHASIL
			echo "<font color='green'>Data Berhasil ditambahkan.";
			echo "<br/><a href='sablon.php'>Lihat Hasilnya</a>";
		}
	}
	?>
</body>

</html>
