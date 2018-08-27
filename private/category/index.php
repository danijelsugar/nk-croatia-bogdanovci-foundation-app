
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
      select a.sifra, a.naziv, b.ime, b.prezime, b.brojtelefona, c.naziv as klubime, count(d.kategorija) as kategorija
      from kategorija a 
      inner join trener b 
      on a.trener=b.sifra 
      inner join klub c 
      on a.klub=c.sifra
      left join kategorijaigrac d
      on a.sifra=d.kategorija
      group by a.sifra, a.naziv, b.ime, c.naziv order by klubime
    ");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);

  ?>

  <div class="grid-container full">
    <div class="grid-x">
      <?php include_once "../../template/sidebar.php"; ?>
      <div class="cell large-10 medium-9">
        <a href="new.php" class="button expanded">Dodaj kategoriju</a>
        <table class="responsive-card-table unstriped">
          <thead>
            <th>Naziv</th>
            <th>Trener</th>
            <th>Broj telefona</th>
            <th>Klub</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td data-label="Ime"><?php echo $row->naziv; ?></td>
                <td data-label="Trener"><?php echo $row->ime . " " . $row->prezime; ?></td>
                <td data-label="Broj telefona"><?php echo $row->brojtelefona; ?></td>
                <td data-label="Oib"><?php echo $row->klubime; ?></td>
                <td data-label="Akcija">
                  <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                    <i class="fas fa-edit fa-2x"></i>
                  </a>
                  <?php if($row->kategorija==0): ?>
                    <a onclick="return confirm('Sigurno obrisati <?php echo $row->naziv ?> koje trenira <?php echo $row->ime; ?> <?php echo $row->prezime; ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
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
