<html>
<head>
	<title>Aplikasi CRUD</title>
</head>
<body>
<h1>Hapus Wisata</h1>
	<table border="1" width="100%">
	<tr>
		<th>No</th>
		<th>Nama Wisata</th>
		<th>Alamat</th>
		<th>Latitude</th>
		<th>Longtitude</th>
		<th>Kategori</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	$user = $_SESSION["Username"];
	$query = "SELECT * FROM dt_marker INNER JOIN t_pemilik ON dt_marker.idktp = t_pemilik.idktp WHERE email = '".$user."'"; // Query untuk menampilkan semua data lokasi
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$data['id']."</td>";
		echo "<td>".$data['name']."</td>";
		echo "<td>".$data['address']."</td>";
		echo "<td>".$data['lat']."</td>";
		echo "<td>".$data['lng']."</td>";
		echo "<td>".$data['category']."</td>";
		echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
