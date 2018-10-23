<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

 $page=1;
  if(isset($_GET["page"])){
    $page=$_GET["page"];
  }
  
  $query = $connect->prepare("
 
   select count(sifra) from utakmica;
   ");

  $query->execute();
  $totalMatches = $query->fetchColumn();
  $totalPages=ceil($totalMatches/10);
  if($page>$totalPages){
    $page=$totalPages;
  }
  if($page==0){
    $page=1;
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
      select a.sifra, a.naziv, b.naziv as domaci, c.naziv as gost,a.rezultat, a.datumodigravanja, a.napomena
      from utakmica a
      inner join klub b
      on a.klub1=b.sifra
      inner join klub c
      on a.klub2=c.sifra
      order by naziv limit :page, 10"
    );
    $query->bindValue("page",($page*10) - 10,PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>

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
            <th>Rezultat</th>
            <th>Napomena</th>
            <th>Akcija</th>
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

        <nav aria-label="Pagination">
          <ul class="pagination text-center">
            <li class="pagination-previous">
              <a href="index.php?page=<?php echo $page-1; ?>" aria-label="Previous page">
                Prethodno <span class="show-for-sr">page</span>
              </a>
            </li>
            <li class="current"><span class="show-for-sr">Trenutno na</span> <?php echo $page; ?>/<?php echo $totalPages; ?></li>
            <li class="pagination-next">
              <a href="index.php?page=<?php echo $page+1; ?>" aria-label="Next page">
                Sljedeće <span class="show-for-sr">page</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <?php include_once "../../template/scripts.php"; ?>
</body>
</html>
