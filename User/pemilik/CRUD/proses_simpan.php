<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$no = $_POST['no'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longtitude = $_POST['longtitude'];
	$query = "INSERT INTO lokasi VALUES('".$no."','".$alamat."', '".$latitude."', '".$longtitude."')";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_tambah.php'>Kembali Ke Form</a>";
	}
?>
