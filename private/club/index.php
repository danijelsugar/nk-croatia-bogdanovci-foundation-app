<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>
</head>
<body>


  <?php
  $query = $connect->prepare("select * from klub order by brojbodova desc;");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
     <div id="main" class="cell medium-10">
       <a href="new.php" class="button expanded">Dodaj novi klub</a>
       <table class="responsive-card-table unstriped">
        <thead>
          <th>Pozicija</th>
          <th>Naziv</th>
          <th>Broj Bodova</th>
          <th>Zabijenih golova</th>
          <th>Primljenih golova</th>
          <th>Akcija</th>
        </thead>
        <tbody>
          <?php foreach($result as $row): ?>
            <tr>
              <td data-label="Pozicija"><?php echo $row->pozicija; ?>.</td>
              <td class="popup" id="cell_<?php echo $row->sifra; ?>" data-label="Naziv"><?php echo $row->naziv; ?></td>
              <td data-label="Broj bodova"><?php echo $row->brojbodova; ?></td>
              <td data-label="Zabijenih golova"><?php echo $row->zabijenihgolova; ?></td>
              <td data-label="Primljenih golova"><?php echo $row->primljenihgolova; ?></td>
              <td data-label="Akcija">
                <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-edit fa-2x"></i>
                </a>
                <a onclick="return confirm('Sigurno obrisati <?php echo $row->naziv; ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-trash fa-2x"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="reveal small" id="popisIgraca" data-reveal>
    
    Popis igraca

   
    
    <button class="close-button" data-close aria-label="Zatvori" type="button">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>


<?php include_once "../../template/scripts.php"; ?>
<script type="text/javascript">
$(document).ready(function(){
  var sifra;
  $(".popup").click(function(){
    sifra=$(this).attr("id").split("_")[1];
    $('#popisIgraca').foundation("open");
    $.ajax({
      type: "POST",
      url: "popisIgraca.php",
      data: "sifra=" + sifra,
      success: function(data){
        $('#json').html(data);
        console.log("sent");
        var a = data;
        console.log(a);
    }
    });
    return false;
  });

});
</script>
</body>
</html>
