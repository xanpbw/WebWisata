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
	<h1>Tambah Data Lokasi</h1>
	<form method="post" action="proses_simpan.php" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>No</td>
		<td><input type="text" name="no"></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><input type="text" onChange="geocodeLokasi()" id="alamat" name="alamat"></td>
	</tr>
	<tr>
		<td>Latitude</td>
		<td><input type="text" name="latitude" id="lat"></td>
	</tr>
	<tr>
		<td>Longtitude</td>
		<td><input type="text" name="longtitude" id="lng"></td>
	</tr>
	</table>
	<div id="map-canvas" style="width: 500px; height: 500px; margin-top: 20px">
    </div>
	<hr>
	<input type="submit" value="Simpan">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
