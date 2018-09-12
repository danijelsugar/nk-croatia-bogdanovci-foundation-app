<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

$error = array();

if(isset($_POST["dodaj"])){

  if(trim($_POST["naziv"])===""){
    $error["naziv"] = "Obavezan unos naziva kategorije";
  }

  if(strlen($_POST["naziv"])>50){
    $error["naziv"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["naziv"]) . " znakova";
  }

  if($_POST["trener"]==="0"){
    $error["trener"] = "Obavezan odabir trenera";
  }else{
    $query = $connect->prepare("select count(sifra) from trener where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["trener"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["trener"] = "Mislis da si pametan, e pa nisi";
    }
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


  if(count($error)==0){
    $query = $connect->prepare("insert into kategorija (naziv,trener,klub) values 
                      (:naziv,:trener,:klub)" );
    $query->bindParam(":naziv",$_POST["naziv"]);
    $query->bindParam(":trener",$_POST["trener"]);
    $query->bindParam(":klub",$_POST["klub"]);
    $query->execute();
    header("location: index.php");

  }
}





?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>

  <style>
    .medium-6 {
      padding: 10px;
    }
  </style>
</head>
<body>
  
  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
      <div id="main" class="cell medium-10">
        <form class="callout" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
           <div class="floated-label-wrapper">

            <?php if(!isset($error["naziv"])): ?>

            <label for="naziv">Naziv</label>
            <input autocomplete="off" type="text" id="naziv" name="naziv"
            value="<?php echo isset($_POST["naziv"]) ? $_POST["naziv"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text"
              value="<?php echo $_POST["naziv"]; ?>" 
              class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="naziv" name="naziv">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["naziv"]; ?>
              </span>
            </label>

              <?php endif;?>
          </div>
          
          <div class="grid-x">
            <div class="cell medium-6">

              <label  <?php if(isset($error["trener"])){
              echo ' class="is-invalid-label" ';
              } ?> for="trener">Trener</label>
              <select <?php if(isset($error["trener"])){
              echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
              } ?> id="trener" name="trener">
              <option value="0">Odaberi trenera</option>  
              <?php 
              
              $query = $connect->prepare("select * from trener order by ime");
              $query->execute();
              $result = $query->fetchAll(PDO::FETCH_OBJ);
               foreach($result as $row):?>

               <option
               <?php 
               if(isset($_POST["trener"]) && $_POST["trener"]==$row->sifra){
                 echo ' selected="selected" ';
               }
               ?>
                value="<?php echo $row->sifra ?>"><?php echo $row->ime . " " . $row->prezime ?></option>  
              <?php endforeach;?>
                
                ?>
              </select>
              <?php if(isset($error["trener"])): ?>
              <span class="form-error is-visible" id="nazivGreska">
                <?php echo $error["trener"]; ?>
                </span>
                
              <?php endif;?>

            </div>

            <div class="cell medium-6">

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
                  foreach($result as $row): ?>
                
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

          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novu kategoriju">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
