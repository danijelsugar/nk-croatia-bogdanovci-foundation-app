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
    $error["naziv"] = "Obavezan unos naziva (npr. 1.kolo, 2.kolo ...)";
  }

  if(strlen($_POST["naziv"])>50){
    $error["naziv"] = "Naziv može maksimalno imati 50 znakova, vi ste stavili " . strlen($_POST["naziv"]) . " znakova";
  }

  if($_POST["domaci"]==="0"){
    $error["domaci"] = "Obavezan odabir";
  }else{
    $query = $connect->prepare("select count(sifra) from klub where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["domaci"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["domaci"] = "Mislis da si pametan, e pa nisi";
    }
  }

  if($_POST["gost"]==="0"){
    $error["gost"] = "Obavezan odabir";
  }else{
    $query = $connect->prepare("select count(sifra) from klub where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["gost"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["gost"] = "Misliš da si pametan, e pa nisi!";
    }
  }

  if(empty($_POST["datumodigravanja"])){
    $error["datumodigravanja"] = "Obavezan unos";
  }

  if(count($error)===0){
    $query = $connect->prepare("update utakmica set 
                      naziv=:naziv,
                      klub1=:domaci,
                      klub2=:gost,
                      datumodigravanja=:datumodigravanja,
                      napomena=:napomena 
                      where sifra=:sifra");
    $query->bindParam("sifra",$_POST["sifra"]);
    $query->bindParam("naziv",$_POST["naziv"]);
    $query->bindParam("klub1",$_POST["domaci"]);
    $query->bindParam("klub2",$_POST["gost"]);
    $query->bindParam("datumodigravanja",$_POST["datumodigravanja"]);
    if($_POST["napomena"]==""){
      $query->bindValue(":napomena",null,PDO::PARAM_INT);
    }else{
      $query->bindParam("napomena",$_POST["napomena"]);
    }
    $query->execute();
    header("location: index.php");
  }

}else{
    $query = $connect->prepare("select * from utakmica where sifra=:sifra");
    $query->execute($_GET);
    $_POST = $query->fetch(PDO::FETCH_ASSOC);
    if(strlen($_POST["datumodigravanja"])>0){
      $_POST["datumodigravanja"] = date("Y-m-d\TH:i:s",strtotime($_POST["datumodigravanja"]));
    }
  }
print_r($_GET);
echo "<br>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>

  <style>
    .medium-4 {
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
            <div class="cell medium-4">
              
              <label <?php if(isset($error["domaci"])){
                echo ' class="is-invalid-label" ';
              } ?> for="domaci">Domaći</label>
                <select <?php if(isset($error["domaci"])){
                  echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
                } ?> name="domaci" id="domaci">
                  <option value="0">Odaberi domaću ekipu</option>

                  <?php 

                    $query = $connect->prepare("select * from klub order by naziv");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach($result as $row): 
                  ?>
          
                  <option
                  <?php 

                    if(isset($_POST["domaci"]) && $_POST["domaci"]==$row->sifra){
                      echo ' selected="selected" ';
                    }

                  ?> 
                    value="<?php echo $row->sifra; ?>"><?php echo $row->naziv; ?></option>

                  <?php endforeach; ?>
                </select>

                <?php if(isset($error["domaci"])): ?>

                <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $error["domaci"]; ?>
                </span>

              <?php endif; ?>

            </div>

            <div class="cell medium-4">

              <label <?php if(isset($error["gost"])){
                echo ' class="is-invalid-label" ';
               } ?> for="gost">Gost</label>
              <select <?php if(isset($error["gost"])){
                echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
               } ?> name="gost" id="gost">
                <option value="0">Odaberi gostujuću ekipu</option>

                <?php 

                  $query = $connect->prepare("select * from klub order by naziv");
                  $query->execute();
                  $result = $query->fetchAll(PDO::FETCH_OBJ);
                  foreach($result as $row): ?>
                
                    <option
                    <?php 

                      if(isset($_POST["gost"]) && $_POST["gost"]==$row->sifra){
                        echo ' selected="selected" ';
                      }

                    ?>
                     value="<?php echo $row->sifra; ?>"><?php echo $row->naziv; ?></option>

                  <?php endforeach; ?>
              </select>

              <?php if(isset($error["gost"])): ?>

                <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $error["gost"]; ?>
                </span>
                  
              <?php endif;?>

            </div>

            <div class="cell medium-4">
              <div class="floated-label">
                <label <?php if(isset($error["datumodigravanja"])){
                  echo ' class="is-invalid-label" ';
                } ?> for="datumodigravanja">Datum odigravanja</label>
                <input 
                <?php if(isset($error["datumodigravanja"])){
                  echo ' class="is-invalid-input" data-invalid="" aria-invalid="true" ';
                } ?>
                value="<?php echo isset($_POST["datumodigravanja"]) ? $_POST["datumodigravanja"] : "" ?>"
                autocomplete="off" type="datetime-local"  id="datumodigravanja" name="datumodigravanja" >

                <?php if(isset($error["datumodigravanja"])): ?>
                <span class="form-error is-visible" id="nazivGreska">
                <?php echo $error["datumodigravanja"]; ?>
                </span>
                <?php endif;?>

              </div>
            </div>
          </div>

          <div class="floated-label">
            <label for="napomena">Napomena</label>
            <textarea name="napomena" id="napomena" cols="10" rows="10">
              <?php echo isset($_POST["napomena"]) ? trim($_POST["napomena"]) : "" ?>
            </textarea>
          </div>

          <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"]; ?>">
          <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
