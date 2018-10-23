<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
  header("location " . $pathAPP . "logout.php");
}

$error = array();
if(isset($_POST["promjeni"])){


  if(trim($_POST["naziv"])===""){
    $error["naziv"] = "Obavezan unos";
  }

  if(strlen($_POST["naziv"])>50){
    $error["naziv"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["naziv"]) . " znakova";
  }

  if(!is_numeric($_POST["brojbodova"])){
    $error["brojBodova"] = "Nije broj";
  }

  if(trim($_POST["brojbodova"])===""){
    $error["brojBodova"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["zabijenihgolova"])){
    $error["zabijenihGolova"] = "Nije broj";
  }

  if(trim($_POST["zabijenihgolova"])===""){
    $error["zabijenihGolova"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["primljenihgolova"])){
    $error["primljenihGolova"] = "Nije broj";
  }

  if(trim($_POST["primljenihgolova"])===""){
    $error["primljenihGolova"] = "Obavezan unos";
  }

   if(!is_numeric($_POST["pobjeda"])){
    $error["pobjeda"] = "Nije broj";
  }

  if(trim($_POST["pobjeda"])===""){
    $error["pobjeda"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["nerijesenih"])){
    $error["nerijesenih"] = "Nije broj";
  }

  if(trim($_POST["nerijesenih"])===""){
    $error["nerijesenih"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["izgubljenih"])){
    $error["izgubljenih"] = "Nije broj";
  }

  if(trim($_POST["izgubljenih"])===""){
    $error["izgubljenih"] = "Obavezan unos";
  }

  if(count($error)===0){
    $query = $connect->prepare("update klub set naziv=:naziv,
                            brojbodova=:brojbodova,
                            zabijenihgolova=:zabijenihgolova,
                            primljenihgolova=:primljenihgolova,
                            pobjeda=:pobjeda,
                            nerijesenih=:nerijesenih,
                            izgubljenih=:izgubljenih where sifra=:sifra;");
  unset($_POST["promjeni"]);
  $query->execute($_POST);
  header("location: index.php");
  }
  
}else{
  $query = $connect->prepare("select * from klub where sifra=:sifra;");
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
        <form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="floated-label">

            <?php if(!isset($error["naziv"])): ?>

            <label for="trajanje">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv" 
            value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : "" ?>"> 

            <?php else: ?>

            <label class="is-invalid-label">
              Naziv
              <input type="text"
              value="<?php echo $_POST["naziv"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="naziv" name="naziv">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["naziv"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["brojBodova"])): ?>

            <label for="cijena">Broj bodova</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="brojbodova" name="brojbodova" 
            value="<?php echo isset($_POST["brojbodova"]) ? $_POST["brojbodova"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Broj bodova
              <input type="number"
              value="<?php echo $_POST["brojbodova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="brojbodova" name="brojbodova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojBodova"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["zabijenihGolova"])): ?>

            <label for="cijena">Zabijenih golova</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="zabijenihgolova" name="zabijenihgolova" 
            value="<?php echo isset($_POST["zabijenihgolova"]) ? $_POST["zabijenihgolova"] : "" ?>" > 

            <?php else: ?>

            <label class="is-invalid-label">
              Zabijenih golova
              <input type="number"
              value="<?php echo $_POST["zabijenihgolova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="zabijenihgolova" name="zabijenihgolova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["zabijenihGolova"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["primljenihGolova"])): ?>

            <label for="upisnina">Primljenih golova</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="primljenihgolova" name="primljenihgolova" 
            value="<?php echo isset($_POST["primljenihgolova"]) ? $_POST["primljenihgolova"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Primljenih golova
              <input type="number"
              value="<?php echo $_POST["primljenihgolova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="primljenihgolova" name="primljenihgolova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["primljenihGolova"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["pobjeda"])): ?>

            <label for="pobjeda">Pobjeda</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="pobjeda" name="pobjeda" 
            value="<?php echo isset($_POST["pobjeda"]) ? $_POST["pobjeda"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Pobjeda
              <input type="number"
              value="<?php echo $_POST["pobjeda"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="pobjeda" name="pobjeda">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["pobjeda"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["nerijesenih"])): ?>

            <label for="nerijesenih">Nerijesenih</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="nerijesenih" name="nerijesenih" 
            value="<?php echo isset($_POST["nerijesenih"]) ? $_POST["nerijesenih"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Nerijesenih
              <input type="number"
              value="<?php echo $_POST["nerijesenih"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="nerijesenih" name="nerijesenih">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["nerijesenih"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["izgubljenih"])): ?>

            <label for="izgubljenih">Izgubljenih</label>
            <input autocomplete="off" type="number" min="0" max="10000" id="izgubljenih" name="izgubljenih" 
            value="<?php echo isset($_POST["izgubljenih"]) ? $_POST["izgubljenih"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Nerijesenih
              <input type="number"
              value="<?php echo $_POST["izgubljenih"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="10000" id="izgubljenih" name="izgubljenih">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["izgubljenih"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"]; ?>" />
          <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
