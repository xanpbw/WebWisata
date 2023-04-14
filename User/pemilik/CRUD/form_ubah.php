<html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
	<?php // isi key sesuai dengan key yang anda dapatkan ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq_SCcm6scjldhMwO4kCqos7xbiP1Gi4Y&libraries=places"></script>
	<?php // proses inisialisasi map ?>
    <script type="text/javascript">
        var geocoder;
        var map;
        function initialize() {  
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-6.9174639, 107.61912280000001);
            var mapOptions = {
                zoom: 12,
                center: latlng
              }
              map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            }
 	<?php // membuat fungsi geocoder untuk mendapatkan latitude dan longtitude ?>
    function geocodeLokasi() {
  var address = document.getElementById('alamat').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location          
      });
      var lat = results[0].geometry.location.lat();
      var lng = results[0].geometry.location.lng();
    } else {
      alert('Geocode gagal dilakukan karena : ' + status);
    }
      document.getElementById("lat").value = lat;      
      document.getElementById('lng').value=lng;    
  });
}
 
        google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
	<h1>Ubah Data Lokasi</h1>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	// Ambil data no yang dikirim oleh index.php melalui URL
	$no = $_GET['no'];
	// Query untuk menampilkan data lokasi berdasarkan no yang dikirim
	$query = "SELECT * FROM lokasi WHERE no='".$no."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="proses_ubah.php?no=<?php echo $no; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>Alamat</td>
		<td><input type="text" onChange="geocodeLokasi()" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
	</tr>
	<tr>
		<td>Latitude</td>
		<td><input type="text" name="latitude" id="lat" value="<?php echo $data['latitude']; ?>"></td>
	</tr>
	<tr>
		<td>Longtitude</td>
		<td><input type="text" name="longtitude" id="lng" value="<?php echo $data['longtitude']; ?>"></td>
	</tr>
	</table>
	<div id="map-canvas" style="width: 500px; height: 500px; margin-top: 20px">
    </div>
	<hr>
	<input type="submit" value="Ubah">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
