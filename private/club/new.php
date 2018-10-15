<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

$error = array();
if(isset($_POST["dodaj"])){

  if(!is_numeric($_POST["pozicija"])){
    $error["pozicija"] = "Nije broj";
  }

  if(trim($_POST["pozicija"])===""){
    $error["pozicija"] = "Obavezan unos";
  }

  if(trim($_POST["naziv"])===""){
    $error["naziv"] = "Obavezan unos";
  }

  if(strlen($_POST["naziv"])>50){
    $error["naziv"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["naziv"]) . " znakova";
  }

  if(!is_numeric($_POST["brojBodova"])){
    $error["brojBodova"] = "Nije broj";
  }

  if(trim($_POST["brojBodova"])===""){
    $error["brojBodova"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["zabijenihGolova"])){
    $error["zabijenihGolova"] = "Nije broj";
  }

  if(trim($_POST["zabijenihGolova"])===""){
    $error["zabijenihGolova"] = "Obavezan unos";
  }

  if(!is_numeric($_POST["primljenihGolova"])){
    $error["primljenihGolova"] = "Nije broj";
  }

  if(trim($_POST["primljenihGolova"])===""){
    $error["primljenihGolova"] = "Obavezan unos";
  }

  if(count($error)===0){
    $query = $connect->prepare("insert into klub (pozicija,naziv,brojbodova,zabijenihgolova,primljenihgolova) values 
                              (:pozicija,:naziv,:brojBodova,:zabijenihGolova,:primljenihGolova)" );
    unset($_POST["dodaj"]);
    $query->execute($_POST);
    header("location: index.php");
  }


}
print_r($_POST);
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

            <?php if(!isset($error["pozicija"])): ?>

            <label for="naziv">Pozicija</label>
            <input autocomplete="off" type="number" min="1" max="100" id="pozicija" name="pozicija" 
            value="<?php echo isset($_POST["pozicija"]) ? $_POST["pozicija"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Pozicija
              <input type="text"
              value="<?php echo isset($_POST["pozicija"]) ? $_POST["pozicija"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="1" max="100" id="pozicija" name="pozicija">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["pozicija"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
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
            <input autocomplete="off" type="number" min="1" max="10000" id="brojBodova" name="brojBodova" 
            value="<?php echo isset($_POST["brojBodova"]) ? $_POST["brojBodova"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Broj bodova
              <input type="number"
              value="<?php echo $_POST["brojBodova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojBodova" name="brojBodova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojBodova"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["zabijenihGolova"])): ?>

            <label for="cijena">Zabijenih golova</label>
            <input autocomplete="off" type="number" min="1" max="10000" id="zabijenihGolova" name="zabijenihGolova" 
            value="<?php echo isset($_POST["zabijenihGolova"]) ? $_POST["zabijenihGolova"] : "" ?>" > 

            <?php else: ?>

            <label class="is-invalid-label">
              Zabijenih golova
              <input type="number"
              value="<?php echo $_POST["zabijenihGolova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="zabijenihGolova" name="zabijenihGolova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["zabijenihGolova"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["primljenihGolova"])): ?>

            <label for="upisnina">Primljenih golova</label>
            <input autocomplete="off" type="number" min="1" max="10000" id="primljenihGolova" name="primljenihGolova" 
            value="<?php echo isset($_POST["primljenihGolova"]) ? $_POST["primljenihGolova"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Primljenih golova
              <input type="number"
              value="<?php echo $_POST["primljenihGolova"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="primljenihGolova" name="primljenihGolova">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["primljenihGolova"]; ?>
              </span>
            </label>

            <?php endif; ?>

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
