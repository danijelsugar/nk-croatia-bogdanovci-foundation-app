<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

 
  $query = $connect->prepare("
    select a.sifra, b.naziv as kategorija, concat(c.ime,' ',c.prezime) as igrac from kategorijaigrac a 
    inner join kategorija b 
    on a.kategorija=b.sifra inner join igrac c on a.igrac=c.sifra
    ");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../../template/head.php"; ?>
</head>
<body>

  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
      <div id="main" class="cell large-10">
        <a href="new.php" class="button expanded">Dodaj</a>
        <table class="responsive-card-table unstriped">
          <thead>
            <th>Igrač</th>
            <th>Kategorija</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td><?php echo $row->igrac ?></td>
                <td><?php echo $row->kategorija ?></td>
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
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
