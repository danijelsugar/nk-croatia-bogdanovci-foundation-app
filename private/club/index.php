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

  <div class="grid-container full">
    <div class="grid-x">
     <?php include_once "../../template/sidebar.php"; ?>
     <div class="cell large-10 medium-9">
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
              <td data-label="Pozicija"><?php echo $row->pozicija; ?></td>
              <td data-label="Naziv"><?php echo $row->naziv; ?></td>
              <td data-label="Broj bodova"><?php echo $row->brojbodova; ?></td>
              <td data-label="Zabijenih golova"><?php echo $row->zabijenihgolova; ?></td>
              <td data-label="Primljenih golova"><?php echo $row->primljenihgolova; ?></td>
              <td data-label="Akcija">
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
</div>


<?php include_once "../../template/scripts.php"; ?>
</body>
</html>
