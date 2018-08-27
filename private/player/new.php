<?php include_once "../../configuration.php";
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}


if(isset($_POST["dodaj"])){
  $query = $connect->prepare("insert into igrac (ime,prezime,oib,brojtelefona,brojregistracije) values
    (:ime,:prezime,:oib,:brojTelefona,:brojRegistracije)");
  unset($_POST["dodaj"]);
  $query->execute($_POST);
  header("location: index.php");

}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>
</head>
<body>
  <?php// include_once "../../template/header.php" ?>

  <?php// include_once "../../template/navbar.php"; ?>
  
  <div class="grid-container full">
    <div class="grid-x">
      <?php include_once "../../template/sidebar.php"; ?>
      <div class="cell large-10 medium-9">
        <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">
            <label for="naziv">Ime</label>
            <input autocomplete="off" type="text" id="ime" name="ime">
          </div>
          <div class="floated-label">
            <label for="trajanje">Prezime</label>
            <input autocomplete="off" type="text" id="prezime" name="prezime">
          </div>
          <div class="floated-label">
            <label for="cijena">Oib</label>
            <input autocomplete="off" type="text" id="oib" name="oib" >
          </div>
          <div class="floated-label">
            <label for="cijena">Broj telefona</label>
            <input autocomplete="off" type="text" id="brojTelefona" name="brojTelefona" >
          </div>
          <div class="floated-label">
            <label for="upisnina">Broj registracije</label>
            <input autocomplete="off" type="text" id="brojRegistracije" name="brojRegistracije" >
          </div>
          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novog igrača">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
