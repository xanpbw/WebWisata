<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data no yang dikirim oleh index.php melalui URL
$no = $_GET['id'];

// Query untuk menghapus data lokasi berdasarkan no yang dikirim dari index.php melalui URL
$query = "DELETE FROM dt_marker WHERE id='".$no."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location: nilai.php"); // Redirect ke halaman index.php
}else{
	// Jika Gagal, Lakukan :
	echo "Data gagal dihapus. <a href='nilai.php'>Kembali</a>";
}
?>
