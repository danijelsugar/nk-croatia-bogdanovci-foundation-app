<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}


if(isset($_POST["dodaj"])){
  $query = $connect->prepare("insert into trener (ime,prezime,oib,brojtelefona,brojlicence) values
                            (:ime,:prezime,:oib,:brojTelefona,:brojLicence)");
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
  <?php include_once "../../template/header.php" ?>

  <?php include_once "../../template/navbar.php"; ?>

  <div class="grid-container">
    <div class="grid-x">
      <div class="cell large-12 ">
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
            <label for="upisnina">Broj licence</label>
            <input autocomplete="off" type="text" id="brojLicence" name="brojLicence" >
          </div>
          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi klub">
        </form>
      </div>
    </div>
  </div>

    <?php include_once "../../template/footer.php"; ?>

    <?php include_once "../../template/scripts.php"; ?>
  </body>
  </html>
