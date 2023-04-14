<!DOCTYPE html >
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Wisata Kota Bandung</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyABAiRMExl_KVCugrFbUO5FJwNTo_94vt0&sensor=false"></script>
 
<style>
          html, body {
               font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
               font-size: medium;
               }
          #map {
               width: 900px;
               height: 500px;
               border: 1px solid black;
          }
</style>
 
<script type="text/javascript">
 
     //Mendefinisikan alamat icons yang akan digunakan
    var customIcons = {
		TamanWisata: {
        icon: 'icons/alun.png'
      },
	  Resort: {
        icon: 'icons/motel.png'
      },
	  TamanHiburan: {
        icon: 'icons/th.png'
      },
	  WisataAlam: {
        icon: 'icons/wa.png'
      },
      stasiun: {
        icon: 'icons/stasiun.png'
      },
      TamanKota: {
        icon: 'icons/monumen.png'
      },
       museum: {
        icon: 'icons/museum.png'
      },
      stadion: {
        icon: 'icons/stadion.png'
      },
       WisataAstronomi: {
        icon: 'icons/astro.png'
      },
       WisataKuliner: {
        icon: 'icons/kul.png'
      },
       universitas: {
        icon: 'icons/universitas.png'
      }
    };
 
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-6.911717, 107.608060),
        zoom: 12,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
 
      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam datalokasimapsbdg.php
      downloadUrl("datalokasimapsbdg.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("category");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b><br/>" + address;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
 
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }
 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
 
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
 
      request.open('GET', url, true);
      request.send(null);
    }
 
    function doNothing() {}
 
</script>
 
</head>
 
<body onLoad="load()">
 
<center>
<div id="map"></div>
</center>
</body>
 
</html>