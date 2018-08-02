<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}


if(isset($_POST["dodaj"])){
  $query = $connect->prepare("insert into klub (pozicija,naziv,brojbodova,zabijenihgolova,primljenihgolova) values 
    (:pozicija,:naziv,:brojBodova,:zabijenihGolova,:primljenihGolova)" );
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
            <label for="naziv">Pozicija</label>
            <input autocomplete="off" type="number" min="1" max="100" id="pozicija" name="pozicija">
          </div>
          <div class="floated-label">
            <label for="trajanje">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv" >
          </div>
          <div class="floated-label">
            <label for="cijena">Broj bodova</label>
            <input autocomplete="off" type="number" min="1" max="10000" id="brojBodova" name="brojBodova" >
          </div>
          <div class="floated-label">
            <label for="cijena">Zabijenih golova</label>
            <input autocomplete="off" type="number" min="1" max="10000" id="zabijenihGolova" name="zabijenihGolova" >
          </div>
          <div class="floated-label">
            <label for="upisnina">Primljenih golova</label>
            <input autocomplete="off" type="number" min="1" max="10000" id="primljenihGolova" name="primljenihGolova" >
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
