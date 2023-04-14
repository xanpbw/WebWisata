<html>
<head>
    <title>Demo Geocode</title>
	<?php // isi key sesuai dengan key yang anda dapatkan ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGr1A9mqRJijnRnvhMR2VVNb98Wc0kNfw&libraries=places"></script>
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
<center>
    <h2>Demo Geocode<span style="font-size: 12px; font-style: italic; opacity: 0.7"> by IF UNIKOM</span></h2>
    <label>Alamat: </label><input type="text" onChange="geocodeLokasi()" id="alamat"><br><br>
    <label>Lat: </label><input type="text" id="lat"> <label>Long: </label><input type="text" id="lng">
    <div id="map-canvas" style="width: 500px; height: 500px; margin-top: 20px">
    </div>
</center>
</body>
</html>