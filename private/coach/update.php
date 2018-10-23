<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location " . $pathAPP . "logout.php");
}

if(isset($_POST["promjeni"])){

  if(trim($_POST["ime"])===""){
    $error["ime"] = "Obavezan unos";
  }

  if(strlen($_POST["ime"])>50){
    $error["ime"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["ime"]) . " znakova";
  }

  if(trim($_POST["prezime"])===""){
    $error["prezime"] = "Obavezan unos";
  }

  if(strlen($_POST["prezime"])>50){
    $error["prezime"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["prezime"]) . " znakova";
  }

  if(strlen($_POST["oib"])!=11){
    $error["oib"] = "Oib mora imati tocno 11 znamenki";
  }

  if(!is_numeric($_POST["oib"])){
      $error["oib"] = "Oib mora biti broj";
    }

  if(trim($_POST["brojtelefona"])===""){
    $error["brojTelefona"] = "Obavezan unos";
  }

  if(strlen($_POST["brojlicence"])!=6){
    $error["brojLicence"] = "Licenca mora imati tocno 6 znamenki";
  }

  if(!is_numeric($_POST["brojlicence"])){
      $error["brojLicence"] = "Licenca mora biti broj";
    }

  if(count($error)===0){
    $query = $connect->prepare("update trener set ime=:ime,
                            prezime=:prezime,
                            oib=:oib,
                            brojtelefona=:brojtelefona,
                            brojlicence=:brojlicence where sifra=:sifra;");
    unset($_POST["promjeni"]);
    $query->execute($_POST);
    header("location: index.php");
  }
  
}else{
  $query = $connect->prepare("select * from trener where sifra=:sifra;");
  $query->execute($_GET);
  $_POST = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>
</head>
<body>

  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
      <div id="main" class="cell medium-10">
        <form class="callout" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">

            <?php if(!isset($error["ime"])): ?>

            <label for="ime">Ime</label>
            <input autocomplete="off" type="text" id="ime" name="ime" 
            value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Ime
              <input type="text"
              value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="ime" name="ime">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["ime"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["prezime"])): ?>

            <label for="prezime">Prezime</label>
            <input autocomplete="off" type="text" id="prezime" name="prezime" 
            value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Prezime
              <input type="text"
              value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="prezime" name="prezime">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["prezime"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["oib"])): ?>

            <label for="cijena">Oib</label>
            <input autocomplete="off" type="text" id="oib" name="oib" 
            value="<?php echo isset($_POST["oib"]) ? $_POST["oib"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Oib
              <input type="text"
              value="<?php echo isset($_POST["oib"]) ? $_POST["oib"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="oib" name="oib">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["oib"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["brojTelefona"])): ?>

            <label for="cijena">Broj telefona</label>
            <input autocomplete="off" type="text" id="brojtelefona" name="brojtelefona" 
            value="<?php echo isset($_POST["brojtelefona"]) ? $_POST["brojtelefona"] : "" ?>" >

             <?php else: ?>

            <label class="is-invalid-label">
              Broj telefona
              <input type="text"
              value="<?php echo isset($_POST["brojtelefona"]) ? $_POST["brojtelefona"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojtelefona" name="brojtelefona">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojTelefona"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["brojLicence"])): ?>

            <label for="brojlicence">Licenca</label>
            <input autocomplete="off" type="text" id="brojlicence" name="brojlicence" 
            value="<?php echo isset($_POST["brojlicence"]) ? $_POST["brojlicence"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Licenca
              <input type="text"
              value="<?php echo isset($_POST["brojlicence"]) ? $_POST["brojlicence"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojlicence" name="brojlicence">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojLicence"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"] ?>" />
          <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
