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

  <?php include_once "../../template/navbar.php"; ?>

  <?php
  $query = $connect->prepare("select * from klub order by brojbodova desc;");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

  <div class="grid-container">
    <h1>Klubovi</h1>
    <div class="grid-x grid-margin-x grid-padding-x"></div>
    <a href="new.php" class="button expanded">Dodaj novi klub</a>
    <table>
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
            <td><?php echo $row->pozicija; ?></td>
            <td><?php echo $row->naziv; ?></td>
            <td><?php echo $row->brojbodova; ?></td>
            <td><?php echo $row->zabijenihgolova; ?></td>
            <td><?php echo $row->primljenihgolova; ?></td>
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

  <?php include_once "../../template/footer.php"; ?>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
