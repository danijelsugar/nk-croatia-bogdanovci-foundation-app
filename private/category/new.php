<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}


if(isset($_POST["dodaj"])){
  $query = $connect->prepare("insert into kategorija (naziv,trener,klub) values 
    (:naziv,:trener,:klub)" );
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

  <div class="grid-container full">
    <div class="grid-x">
      <?php include_once "../../template/sidebar.php"; ?>
      <div class="cell large-10 medium-9">
        <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">
            <label for="naziv">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv">
          </div>
          <div class="floated-label">
            <label for="trajanje">Trener</label>
            <input autocomplete="off" type="text" id="trener" name="trener" >
          </div>
          <div class="floated-label">
            <label for="cijena">Klub</label>
            <input autocomplete="off" type="text" id="klub" name="klub" >
          </div>
          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novi klub">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
