<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}
$error = array();

if(isset($_POST["dodaj"])){

  if($_POST["igrac"]==="0"){
    $error["igrac"] = "Obavezan odabir";
  }else{
    $query = $connect->prepare("select count(sifra) from igrac where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["igrac"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["igrac"] = "Mislis da si pametan, e pa nisi";
    }
  }

  if($_POST["kategorija"]==="0"){
    $error["kategorija"] = "Obavezan odabir";
  }else{
    $query = $connect->prepare("select count(sifra) from kategorija where sifra=:sifra");
    $query->execute(array("sifra" => $_POST["kategorija"]));
    $i = $query->fetchColumn();
    if($i==0){
      $error["kategorija"] = "Mislis da si pametan, e pa nisi";
    }
  }

  if(count($error)===0){
    $query = $connect->prepare("insert into kategorijaigrac (kategorija,igrac) values 
                            (:kategorija,:igrac)" );
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

          <div class="grid-x">
            <div class="cell medium-6">
              <label <?php if(isset($error["igrac"])){
                echo ' class="is-invalid-label" ';
              } ?> for="igrac">Igrač</label>
              <select <?php if(isset($error["igrac"])){
                echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
              } ?> name="igrac" id="igrac">
                <option value="0">Igrač</option>

                <?php 

                  $query = $connect->prepare("select * from igrac order by ime");
                  $query->execute();
                  $result = $query->fetchAll(PDO::FETCH_OBJ);
                  foreach($result as $row): 
                ?>
        
                <option
                <?php 

                  if(isset($_POST["igrac"]) && $_POST["igrac"]==$row->sifra){
                    echo ' selected="selected" ';
                  }

                ?> 
                  value="<?php echo $row->sifra; ?>"><?php echo $row->ime . " " . $row->prezime; ?></option>

                <?php endforeach; ?>
              </select>

              <?php if(isset($error["igrac"])): ?>

                <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $error["igrac"]; ?>
                </span>

              <?php endif; ?>

            </div>

            <div class="cell medium-6">
              <label <?php if(isset($error["kategorija"])){
                echo ' class="is-invalid-label" ';
              } ?> for="kategorija">Kategorija</label>
                <select <?php if(isset($error["kategorija"])){
                  echo ' required="" class="is-invalid-input" data-invalid="" aria-invalid="true" ';
                } ?> name="kategorija" id="kategorija">
                  <option value="0">Kategorija</option>

                  <?php 

                    $query = $connect->prepare("select * from kategorija order by naziv");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach($result as $row): 
                  ?>
          
                  <option
                  <?php 

                    if(isset($_POST["kategorija"]) && $_POST["kategorija"]==$row->sifra){
                      echo ' selected="selected" ';
                    }

                  ?> 
                    value="<?php echo $row->sifra; ?>"><?php echo $row->naziv; ?></option>

                  <?php endforeach; ?>
                </select>

                <?php if(isset($error["kategorija"])): ?>

                <span class="form-error is-visible" id="nazivGreska">
                  <?php echo $error["kategorija"]; ?>
                </span>

              <?php endif; ?>

            </div>
            
          </div>
          
          <input class="button expanded" type="submit" name="dodaj" value="Dodaj novo kolo">
          <a class="alert button expanded" href="index.php">Nazad</a>
        </form>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
