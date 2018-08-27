<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location " . $pathAPP . "logout.php");
}

if(isset($_POST["promjeni"])){
  $query = $connect->prepare("update klub set naziv=:naziv,
                            pozicija=:pozicija,
                            brojbodova=:brojBodova,
                            zabijenihgolova=:zabijenihGolova,
                            primljenihgolova=:primljenihGolova where sifra=:sifra;");
  unset($_POST["promjeni"]);
  $query->execute($_POST);
  header("location: index.php");
}else{
  $query = $connect->prepare("select * from klub where sifra=:sifra;");
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
      <div class="cell large-10 medium-9 ">
        <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">
            <label for="naziv">Pozicija</label>
            <input value="<?php echo $o->pozicija; ?>" autocomplete="off" type="number" min="1" max="100" id="pozicija" name="pozicija">
          </div>
          <div class="floated-label">
            <label for="trajanje">Naziv</label>
            <input value="<?php echo $o->naziv; ?>" autocomplete="off" type="text" id="naziv" name="naziv" >
          </div>
          <div class="floated-label">
            <label for="cijena">Broj bodova</label>
            <input value="<?php echo $o->brojbodova; ?>" autocomplete="off" type="number" min="1" max="10000" id="brojBodova" name="brojBodova" >
          </div>
          <div class="floated-label">
            <label for="cijena">Zabijenih golova</label>
            <input value="<?php echo $o->zabijenihgolova; ?>" autocomplete="off" type="number" min="1" max="10000" id="zabijenihGolova" name="zabijenihGolova" >
          </div>
          <div class="floated-label">
            <label for="upisnina">Primljenih golova</label>
            <input value="<?php echo $o->primljenihgolova; ?>" autocomplete="off" type="number" min="1" max="10000" id="primljenihGolova" name="primljenihGolova" >
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
