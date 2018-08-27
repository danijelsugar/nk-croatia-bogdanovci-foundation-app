<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location " . $pathAPP . "logout.php");
}

if(isset($_POST["promjeni"])){
  $query = $connect->prepare("
      update kategorija set 
      naziv=:naziv,
      trener=:trener,
      klub=:klub where sifra=:sifra;
");
  unset($_POST["promjeni"]);
  $query->execute($_POST);
  header("location: index.php");
}else{
  $query = $connect->prepare("select * from kategorija where sifra=:sifra;");
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
            <label for="naziv">Naziv</label>
            <input value="<?php echo $o->naziv; ?>" autocomplete="off" type="text" id="naziv" name="naziv">
          </div>
          <div class="floated-label">
            <label for="trajanje">Trener</label>
            <input value="<?php echo $o->trener; ?>" autocomplete="off" type="text" id="trener" name="trener" >
          </div>
          <div class="floated-label">
            <label for="cijena">Klub</label>
            <input value="<?php echo $o->klub; ?>" autocomplete="off" type="text" id="klub" name="klub" >
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
