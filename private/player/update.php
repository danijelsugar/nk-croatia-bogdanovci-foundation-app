<?php include_once "../../configuration.php";
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

$error = array();
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

  if(strlen($_POST["brojregistracije"])!=6){
    $error["brojRegistracije"] = "Registracija mora imati tocno 6 znamenki";
  }

  if(!is_numeric($_POST["brojregistracije"])){
      $error["brojRegistracije"] = "Registracija mora biti broj";
    }

  if($_POST["klub"]==="0"){
    $error["klub"] = "Obavezan odabir kluba";
  }else{
    $query = $connect->prepare("select count(sifra) from klub where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["klub"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["klub"] = "Mislis da si pametan, e pa nisi";
    }
  }

  if(!is_numeric($_POST["zutikartoni"])){
    $error["zutikartoni"] = "Neispravan unos";
  }

  if(!is_numeric($_POST["crvenikartoni"])){
    $error["crvenikartoni"] = "Neispravan unos";
  }
  if(!is_numeric($_POST["golovi"])){
    $error["golovi"] = "Neispravan unos";
  }

  if(count($error)===0){
    $query = $connect->prepare("update igrac set 
                            ime=:ime,
                            prezime=:prezime,
                            oib=:oib,
                            brojtelefona=:brojtelefona,
                            brojregistracije=:brojregistracije,
                            klub=:klub,
                            zutikartoni=:zutikartoni,
                            crvenikartoni=:crvenikartoni, 
                            golovi=:golovi where sifra=:sifra");
  unset($_POST["promjeni"]);
  $query->execute($_POST);
  header("location: index.php");
  }
  

}else {
  $query = $connect->prepare("select * from igrac where sifra=:sifra;");
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

            <?php if(!isset($error["brojRegistracije"])): ?>

            <label for="upisnina">Registracija</label>
            <input autocomplete="off" type="text" id="brojregistracije" name="brojregistracije" 
            value="<?php echo isset($_POST["brojregistracije"]) ? $_POST["brojregistracije"] : "" ?>" >

            <?php else: ?>

            <label class="is-invalid-label">
              Registracija
              <input type="text"
              value="<?php echo isset($_POST["brojregistracije"]) ? $_POST["brojregistracije"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="brojregistracije" name="brojregistracije">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["brojRegistracije"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="grid-x">
            <div class="cell medium-12">

              <label <?php if(isset($error["klub"])){
              echo ' class="is-invalid-label" ';
              } ?> for="klub">Klub</label>
              <select <?php if(isset($error["klub"])){
              echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
               } ?> name="klub" id="klub">
                <option value="0">Odaberi klub</option>

                <?php 

                  $query = $connect->prepare("select * from klub order by naziv");
                  $query->execute();
                  $result = $query->fetchAll(PDO::FETCH_OBJ);
                  foreach($result as $row): 
                ?>
                
                <option
                <?php 

                  if(isset($_POST["klub"]) && $_POST["klub"]==$row->sifra){
                    echo ' selected="selected" ';
                  }

                ?>
                 value="<?php echo $row->sifra; ?>"><?php echo $row->naziv; ?>
                   
                </option>

                <?php endforeach; ?>
              </select>

              <?php if(isset($error["klub"])): ?>

                <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $error["klub"]; ?>
                </span>
                  
              <?php endif;?>

            </div>
          </div>
          <div class="floated-label">

            <?php if(!isset($error["zutikartoni"])): ?>

            <label for="zutikartoni">Žuti kartoni</label>
            <input autocomplete="off" type="number" min="0" max="100" id="zutikartoni" name="zutikartoni" 
            value="<?php echo isset($_POST["zutikartoni"]) ? $_POST["zutikartoni"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Žuti kartoni
              <input type="text"
              value="<?php echo isset($_POST["zutikartoni"]) ? $_POST["zutikartoni"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="100" id="zutikartoni" name="zutikartoni">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["zutikartoni"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["crvenikartoni"])): ?>

            <label for="crvenikartoni">Crveni kartoni</label>
            <input autocomplete="off" type="number" min="0" max="100" id="crvenikartoni" name="crvenikartoni" 
            value="<?php echo isset($_POST["crvenikartoni"]) ? $_POST["crvenikartoni"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Crveni kartoni
              <input type="text"
              value="<?php echo isset($_POST["crvenikartoni"]) ? $_POST["crvenikartoni"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="100" id="crvenikartoni" name="crvenikartoni">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["crvenikartoni"]; ?>
              </span>
            </label>

            <?php endif; ?>

          </div>
          <div class="floated-label">

            <?php if(!isset($error["golovi"])): ?>

            <label for="golovi">Golovi</label>
            <input autocomplete="off" type="number" min="0" max="100" id="golovi" name="golovi" 
            value="<?php echo isset($_POST["golovi"]) ? $_POST["golovi"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Golovi
              <input type="text"
              value="<?php echo isset($_POST["golovi"]) ? $_POST["golovi"] : "" ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="number" min="0" max="100" id="golovi" name="golovi">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["golovi"]; ?>
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
