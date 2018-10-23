<?php include_once "configuration.php"; 

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
</head>
<body>
    
  <?php
    $query = $connect->prepare("
      select a.sifra, a.naziv, b.naziv as domaci, c.naziv as gost, a.rezultat, a.datumodigravanja, a.napomena
      from utakmica a
      inner join klub b
      on a.klub1=b.sifra
      inner join klub c
      on a.klub2=c.sifra
      order by naziv");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

  <?php include_once "template/header.php" ?>
  <?php include_once "template/navbar.php"; ?>
  
  <div class="grid-container">
    <div class="grid-x schedule align-center">
      <table class="responsive-card-table unstriped">
        <thead>
          <th>Kolo</th>
          <th>Domaći</th>
          <th>Gosti</th>
          <th>Datum</th>
          <th>Rezultat</th>
          <th>Napomena</th>
        </thead>
        <tbody>
          <?php foreach($result as $row): ?>
            <tr>
              <td data-label="Kolo"><?php echo $row->naziv ?></td>
              <td data-label="Domaći"><?php echo $row->domaci ?></td>
              <td data-label="Gosti"><?php echo $row->gost ?></td>
              <td data-label="Datum"><?php echo ($row->datumodigravanja!=null) ? date("d.m.Y. H:i",strtotime($row->datumodigravanja)) : "Nije definirano "; ?></td>
              <td data-label="Rezultat"><?php echo $row->rezultat; ?></td>
              <td data-label="Napomena"><?php echo $row->napomena ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include_once "template/footer.php"; ?>
  <?php include_once "template/scripts.php"; ?>
</body>
</html>
