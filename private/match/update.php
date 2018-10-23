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

  $d=$_POST["datumodigravanja"];
  //19.10.2018 19:37
  $datumodigravanja = 
  substr($d,6,4) . "-" . 
  substr($d,3,2) . "-" . 
  substr($d,0,2) . " " .
  substr($d,11,5);

  if(count($error)===0){
    $query = $connect->prepare("update utakmica set  
                      naziv=:naziv,
                      klub1=:klub1,
                      klub2=:klub2,
                      datumodigravanja=:datumodigravanja,
                      rezultat=:rezultat,
                      napomena=:napomena   
                      where sifra=:sifra");
    $query->bindParam(":sifra",$_POST["sifra"]);
    $query->bindParam(":naziv",$_POST["naziv"]);
    $query->bindParam(":klub1",$_POST["domaci"]);
    $query->bindParam(":klub2",$_POST["gost"]);
    $query->bindParam(":datumodigravanja",$datumodigravanja);

    if($_POST["rezultat"]==""){
      $query->bindValue(":rezultat",null,PDO::PARAM_STR);
    }else{
      $query->bindParam(":rezultat",$_POST["rezultat"]);
    }

    if($_POST["napomena"]==""){
      $query->bindValue(":napomena",null,PDO::PARAM_STR);
    }else{
      $query->bindParam(":napomena",$_POST["napomena"]);
    }
    $query->execute();
    header("location: index.php");
  }

}else{
    $query = $connect->prepare("select * from utakmica where sifra=:sifra");
    $query->execute($_GET);
    $_POST = $query->fetch(PDO::FETCH_ASSOC);
    if(strlen($_POST["datumodigravanja"])>0){
      $_POST["datumodigravanja"] = date("d.m.Y H:i",strtotime($_POST["datumodigravanja"]));
    }
  }
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

                    if(isset($_POST["klub1"]) && $_POST["klub1"]==$row->sifra){
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

                      if(isset($_POST["klub2"]) && $_POST["klub2"]==$row->sifra){
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
                autocomplete="off" type="text"  id="datetimepicker" name="datumodigravanja" >

                <?php if(isset($error["datumodigravanja"])): ?>
                <span class="form-error is-visible" id="nazivGreska">
                <?php echo $error["datumodigravanja"]; ?>
                </span>
                <?php endif;?>

              </div>
            </div>
          </div>

          <div class="floated-label">

            <?php if(!isset($error["rezultat"])): ?>

            <label for="rezultat">Rezultat</label>
            <input autocomplete="off" type="text" id="rezultat" name="rezultat" value="<?php echo isset($_POST["rezultat"]) ? $_POST["rezultat"] : "" ?>">

            <?php else: ?>

            <label class="is-invalid-label">
              Zahtjevani unos
              <input type="text" class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
              aria-invalid="true" autocomplete="off" type="text" id="rezultat" name="rezultat">
              <span class="form-error is-visible" id="nazivGreska">
              <?php echo $error["rezultat"]; ?>
              </span>
            </label>

            <?php endif; ?>
          </div>

          <div class="floated-label">
            <label for="napomena">Napomena</label>
            <textarea name="napomena" id="napomena" cols="10" rows="10"><?php echo isset($_POST["napomena"]) ? trim($_POST["napomena"]) : "" ?></textarea>
          </div>

          <input type="hidden" name="sifra" value="<?php echo $_POST["sifra"]; ?>">
          <input class="button expanded" type="submit" name="promjeni" value="Promjeni">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
  <script src="<?php echo $pathAPP; ?>js/jquery.datetimepicker.full.min.js"></script>
   <script>
    
    //DATETIME PICKER

    jQuery.datetimepicker.setLocale('hr');

    jQuery('#datetimepicker').datetimepicker({
      format:'d.m.Y H:i',
      minDate:'-1970/01/02',
      startDate:'+1971/05/01',
      allowTimes:[
        '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', 
        '03:00', '03:30', '04:00', '04:30', '05:00', '05:30',
        '06:00', '06:30', '07:00', '07:30', '08:00', '08:30',
        '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
        '12:00', '12:30', '13:00', '13:30', '14:00', '14:30',
        '15:00', '15:30', '16:00', '16:30', '17:00', '17:30',
        '18:00', '18:30', '19:00', '19:30', '20:00', '20:30',
        '21:00', '21:30', '22:00', '22:30', '23:00', '23:30',
       ]
    });

  </script>
</body>
</html>
