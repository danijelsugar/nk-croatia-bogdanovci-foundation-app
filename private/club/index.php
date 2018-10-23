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
  $query = $connect->prepare("select a.sifra, a.naziv, a.brojbodova, a.zabijenihgolova, a.primljenihgolova,a.pobjeda,a.nerijesenih,
a.izgubljenih, count(b.sifra) as igraca from klub a left join igrac b on a.sifra=b.klub group by 
a.naziv, a.brojbodova, a.zabijenihgolova, a.primljenihgolova,a.pobjeda,a.nerijesenih,
a.izgubljenih order by brojbodova desc;");
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
          <th>Gol razlika</th>
          <th>Pobjeda</th>
          <th>Neriješenih</th>
          <th>Poraza</th>
          <th>Akcija</th>
        </thead>
        <tbody>
          <?php $i=1; foreach($result as $row): ?>
            <tr>
              <td data-label="Pozicija"><?php echo $i++; ?>.</td>
              <td class="popup" id="cell_<?php echo $row->sifra; ?>" data-label="Naziv"><?php echo $row->naziv; ?></td>
              <td data-label="Broj bodova"><?php echo $row->brojbodova; ?></td>
              <td data-label="Gol razlika"><?php echo $row->zabijenihgolova; ?>:<?php echo $row->primljenihgolova; ?></td>
              <td data-label="Pobjeda"><?php echo $row->pobjeda; ?></td>
              <td data-label="Neriješenih"><?php echo $row->nerijesenih; ?></td>
              <td data-label="Izgubljenih"><?php echo $row->izgubljenih; ?></td>
              <td data-label="Akcija">
                <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-edit fa-2x"></i>
                </a>
                <a onclick="return confirm('Sigurno obrisati <?php echo $row->naziv; ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-trash fa-2x"></i>
                </a>
              </td>
            </tr>
          <?php endforeach;  ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="reveal small" id="popisIgraca" data-reveal>
    
    <table>
      <thead>
        <tr>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Zuti kartoni</th>
          <th>Crveni kartoni</th>
        </tr>
      </thead>
      <tbody id="json">
      
      </tbody>
    </table>
   
    
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
    
    $.ajax({
      type: "POST",
      url: "popisIgraca.php",
      data: "sifra=" + sifra,
      success: function(data){

        var niz = JSON.parse(data);

        var tbody = document.getElementById("json");
          while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }

        $.each(niz,function(kljuc,vrijednost){
          var tr = document.createElement("tr");

          tr.appendChild(dodajCeliju(vrijednost.ime));
          tr.appendChild(dodajCeliju(vrijednost.prezime));
          tr.appendChild(dodajCeliju(vrijednost.zutikartoni));
          tr.appendChild(dodajCeliju(vrijednost.crvenikartoni));

          tbody.appendChild(tr);
        });
        
       
        $('#popisIgraca').foundation("open");
    }
    });
    return false;
  });

});


function dodajCeliju(tekst){
  var td = document.createElement("td");
  var tekst = document.createTextNode(tekst==null ? "" : tekst);
    td.appendChild(tekst);
    return td;
}
</script>
</body>
</html>
