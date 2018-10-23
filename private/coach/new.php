<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

$error = array();
if(isset($_POST["dodaj"])){

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

  if(trim($_POST["brojTelefona"])===""){
    $error["brojTelefona"] = "Obavezan unos";
  }

  if(strlen($_POST["brojLicence"])!=6){
    $error["brojLicence"] = "Licenca mora imati tocno 6 znamenki";
  }

  if(!is_numeric($_POST["brojLicence"])){
      $error["brojLicence"] = "Licenca mora biti broj";
    }

  if(count($error)===0){
    $query = $connect->prepare("insert into trener (ime,prezime,oib,brojtelefona,brojlicence) values
                            (:ime,:prezime,:oib,:brojTelefona,:brojLicence)");
  unset($_POST["dodaj"]);
  $query->execute($_POST);
  header("location: index.php");
  }

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
            <input autocomplete="off" type="text" id="brojTelefona" name="brojTelefona" 
            value="<?php echo isset($_POST["brojTelefona"]) ? $_POST["brojTelefona"] : "" ?>" >

             <?php else: ?>

            <label class="is-invalid-label">
              Broj telefona
              <input type="text"
              value="<?php echo isset($_POST["brojTelefona"]) ? $_POST["brojTelefona"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojTelefona" name="brojTelefona">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojTelefona"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["brojLicence"])): ?>

            <label for="upisnina">Licenca</label>
            <input autocomplete="off" type="text" id="brojLicence" name="brojLicence" 
            value="<?php echo isset($_POST["brojLicence"]) ? $_POST["brojLicence"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Licenca
              <input type="text"
              value="<?php echo isset($_POST["brojLicence"]) ? $_POST["brojLicence"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojLicence" name="brojLicence">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojLicence"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novog trenera">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

    <?php include_once "../../template/scripts.php"; ?>
  </body>
  </html>
