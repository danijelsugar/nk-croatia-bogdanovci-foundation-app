<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

 
  $query = $connect->prepare("
    select a.sifra, a.naziv, b.naziv as domaci, c.naziv as gost, a.datumodigravanja, a.napomena
    from utakmica a
    inner join klub b
    on a.klub1=b.sifra
    inner join klub c
    on a.klub2=c.sifra"
  );
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
        <a href="new.php" class="button expanded">Dodaj kolo</a>
        <table class="responsive-card-table unstriped">
          <thead>
            <th>Kolo</th>
            <th>Domaći</th>
            <th>Gosti</th>
            <th>Datum</th>
            <th>Napomena</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td><?php echo $row->naziv ?></td>
                <td><?php echo $row->domaci ?></td>
                <td><?php echo $row->gost ?></td>
                <td><?php echo ($row->datumodigravanja!=null) ? date("d.m.Y. H:i:s",strtotime($row->datumodigravanja)) : "Nije definirano "; ?></td>
                <td><?php echo $row->napomena ?></td>
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
