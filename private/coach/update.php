<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location " . $pathAPP . "logout.php");
}

if(isset($_POST["promjeni"])){
  $query = $connect->prepare("update trener set ime=:ime,
                            prezime=:prezime,
                            oib=:oib,
                            brojtelefona=:brojTelefona,
                            brojlicence=:brojLicence where sifra=:sifra;");
  unset($_POST["promjeni"]);
  $query->execute($_POST);
  header("location: index.php");
}else{
  $query = $connect->prepare("select * from trener where sifra=:sifra;");
  $query->execute($_GET);
  $o = $query->fetch(PDO::FETCH_OBJ);
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>
</head>
<body>

  <div class="grid-container full">
    <div class="grid-x">
      <?php include_once "../../template/sidebar.php"; ?>
      <div class="cell large-10 medium-9">
        <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">
            <label for="naziv">Ime</label>
            <input value="<?php echo $o->ime; ?>" autocomplete="off" type="text" id="ime" name="ime">
          </div>
          <div class="floated-label">
            <label for="trajanje">Prezime</label>
            <input value="<?php echo $o->prezime; ?>" autocomplete="off" type="text" id="prezime" name="prezime">
          </div>
          <div class="floated-label">
            <label for="cijena">Oib</label>
            <input value="<?php echo $o->oib; ?>" autocomplete="off" type="text" id="oib" name="oib" >
          </div>
          <div class="floated-label">
            <label for="cijena">Broj telefona</label>
            <input value="<?php echo $o->brojtelefona; ?>" autocomplete="off" type="text" id="brojTelefona" name="brojTelefona" >
          </div>
          <div class="floated-label">
            <label for="upisnina">Broj licence</label>
            <input value="<?php echo $o->brojlicence; ?>" autocomplete="off" type="text" id="brojLicence" name="brojLicence" >
          </div>
          <input type="hidden" name="sifra" value="<?php echo $o->sifra ?>" />
          <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
