<?php include_once "configuration.php"; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
</head>
<body>


  <?php include_once "template/navbar.php"; ?>
  
  <div class="grid-container">
  	<h1>My map</h1>
  	<div class="grid-x">
  		<div id="googleMap" style="width: 100%; height: 400px;"></div>
  		<script>
  			//google map function
  			function myMap() {
  				var mapCenter = new google.maps.LatLng(45.342800,18.928486);
  				var mapCanvas = document.getElementById("googleMap");
  				var mapOptions = {center: mapCenter, zoom: 15};
  				var map = new google.maps.Map(mapCanvas, mapOptions);
  				var marker = new google.maps.Marker({position: mapCenter});
  				marker.setMap(map);
  			}
  		</script>
  	</div>
  </div>

  <?php include_once "template/footer.php"; ?>

  <?php include_once "template/scripts.php"; ?>
</body>
</html>
