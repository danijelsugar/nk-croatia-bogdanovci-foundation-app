<?php include_once "configuration.php"; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
</head>
<body>


  <div class="grid-container">
    <?php include_once "template/header.php" ?>
    <?php include_once "template/navbar.php"; ?>
    <!-- GOOGLE MAPS -->
    <div class="grid-x">
      <div id="googleMap" style="width: 100%; height: 600px;"></div>
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
    <!-- / GOOGLE MAPS -->
    <!-- CONTACT INFO -->
    <div class="grid-x">
      <div class="cell large-6 contact-text">
        <h1>Kontakti</h1>
        <p class="blue">Nogometni klub Croatia Bogdanovci mozete kontaktirati svakim radnim danom, te na dan svake domaće utakmice.</p>
        <p><strong>Nogometni klub Croatia Bogdanovci je amaterski sportski klub.</strong></p>
        <p>Matije Gupca bb, 32000 Vukovar</p>
      </div> 
      <div class="cell large-6 ">
        <h4>Opće informacije</h4>
        <ul class="contact-info">
          <li><strong>Web:</strong> <a href="#">www.koasd</a></li>
          <li><strong>Facebook:</strong> <a href="https://www.facebook.com/nkcroatiabogdanovci1947/">fb</a></li>
          <li><strong>Mail:</strong> croatia.bogdanovci@yahoo.com</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- / CONTACT INFO -->

  <?php include_once "template/footer.php"; ?>

  <?php include_once "template/scripts.php"; ?>
  <!-- Google maps -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2-OWWKXPagI2nZVi-uF7msqbfi0aYtqw&callback=myMap">
</script>
</body>
</html>
