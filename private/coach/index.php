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
  <?php include_once "../../template/header.php" ?>
  
  <?php include_once "../../template/navbar.php"; ?>

  <?php
  $query = $connect->prepare("select * from trener;");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

  <div class="grid-container">
    <div class="grid-x">
      <h3>Treneri</h3>
      <hr />
      <a href="new.php" class="button expanded">Dodaj novi klub</a>
      <table class="stack">
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
              <td><?php echo $row->ime ?></td>
              <td><?php echo $row->prezime ?></td>
              <td><?php echo $row->oib ?></td>
              <td><?php echo $row->brojtelefona ?></td>
              <td><?php echo $row->brojlicence ?></td>
              <td>
                <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-edit fa-2x"></i>
                </a>
                <a href="delete.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-trash fa-2x"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include_once "../../template/footer.php"; ?>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
