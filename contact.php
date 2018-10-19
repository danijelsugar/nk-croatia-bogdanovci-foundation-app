<?php include_once "configuration.php"; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
</head>
<body>


  <?php include_once "template/header.php" ?>
  <?php include_once "template/navbar.php"; ?>
  <!-- CONTACT INFO -->
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell large-6">
        <div class="contact-text">
          <h1>Kontakti</h1>
          <p class="blue">Nogometni klub Croatia Bogdanovci mozete kontaktirati svakim radnim danom, te na dan svake domaće utakmice.</p>
          <p><strong>Nogometni klub Croatia Bogdanovci je amaterski sportski klub.</strong></p>
          <h4>Opće informacije</h4>
          <div class="info-details">
            <div class="info-icon">
              <i class="fas fa-map-marker-alt fa-3x"></i>
            </div>
            <div class="info-desc">
              <h3>Adresa</h3>
              <p>Matije Gupca 64a Bogdanovci</p>
            </div>
          </div>
          <div class="info-details">
            <div class="info-icon">
              <i class="fas fa-mobile-alt fa-3x"></i>
            </div>
            <div class="info-desc">
              <h3>Kontakt</h3>
              <p><strong>Email:</strong> croatia.bogdanovci@yahoo.com</p>
              <p><strong>Broj telefona: </strong> 0975858641</p>
            </div>
          </div>
        </div>
      </div> 
      <div class="cell large-6 ">
        <div class="contact-form">
          <form class="contact-us-form" method="POST" action="sendmail.php">
            <input type="text" id="subject" name="subject" placeholder="Naslov">
            <input type="email" id="email" name="email" placeholder="Email">
            <textarea name="message" id="message" rows="12" placeholder="Napišite svoju poruku"></textarea>
            <input type="submit" name="submit" class="button" value="Send it" />  
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- / CONTACT INFO -->
  <div class="grid-container full">
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
  </div>
  <!-- / GOOGLE MAPS -->

  <?php include_once "template/footer.php"; ?>

  <?php include_once "template/scripts.php"; ?>
  <!-- Google maps -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2-OWWKXPagI2nZVi-uF7msqbfi0aYtqw&callback=myMap">
</script>
</body>
</html>
