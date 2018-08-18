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
  $query = $connect->prepare("
    select a.sifra,a.ime,a.prezime,
    a.oib,a.brojtelefona,a.brojlicence, 
    count(b.sifra) as kategorija from trener
    a left join kategorija b on a.sifra=b.trener 
    group by a.sifra,a.ime,a.prezime,a.oib,a.brojtelefona,a.brojlicence;");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

  <div class="grid-container full">
    <div class="grid-x">
      <?php include_once "../../template/sidebar.php"; ?>
      <div class="cell large-10 medium-9">
        <a href="new.php" class="button expanded">Dodaj trenera</a>
        <table class="responsive-card-table unstriped">
          <thead>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Oib</th>
            <th>Broj telefona</th>
            <th>Broj licence</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td data-label="Ime"><?php echo $row->ime ?></td>
                <td data-label="Prezime"><?php echo $row->prezime ?></td>
                <td data-label="Oib"><?php echo $row->oib ?></td>
                <td data-label="Broj telefona"><?php echo $row->brojtelefona ?></td>
                <td data-label="Broj licence"><?php echo $row->brojlicence ?></td>
                <td data-label="Akcija">
                  <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                    <i class="fas fa-edit fa-2x"></i>
                  </a>
                  <?php if($row->kategorija==0): ?>
                    <a onclick="return confirm('Sigurno obrisati <?php echo $row->ime ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
                      <i class="fas fa-trash fa-2x"></i>
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
