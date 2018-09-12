
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
    select a.sifra, a.naziv, b.oib, concat(b.ime, ' ', b.prezime) as trener, c.naziv as klub, count(d.kategorija) as kategorija 
    from kategorija a
    inner join trener b
    on a.trener=b.sifra
    inner join klub c
    on a.klub=c.sifra
    left join kategorijaigrac d
    on a.sifra=d.kategorija
    group by a.naziv, c.naziv, concat(b.ime, ' ', b.prezime)
    order by c.naziv
    ");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>
  
  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
      <div id="main" class="cell medium-10">
        <a href="new.php" class="button expanded">Dodaj kategoriju</a>
        <table class="responsive-card-table unstriped">
          <thead>
            <th>Kategorija</th>
            <th>Klub</th>
            <th>Trener</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td data-label="Kategorija"><?php echo $row->naziv; ?></td>
                <td data-label="Klub"><?php echo $row->klub; ?></td>
                <td data-label="Trener"><?php echo $row->trener; ?></td>
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
