<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Map </title>
<?php // isi key sesuai dengan key yang anda dapatkan ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq_SCcm6scjldhMwO4kCqos7xbiP1Gi4Y&libraries=places"></script> 
<?php // proses inisialisasi map ?>
<script type="text/javascript">
        var map;
        function initialize() {  
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-6.9174639, 107.61912280000001); <?php // koordinat awal map ?>
            var mapOptions = {
                zoom: 8,
                center: latlng
              }
              map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            }
			google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<?php // map ?>
<center><div id="map-canvas" style="width: 500px; height: 500px; margin-top: 20px">
</div>
</center>
</body>
</html>
