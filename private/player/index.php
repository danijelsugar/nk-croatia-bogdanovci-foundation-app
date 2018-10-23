<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

$page=1;
if(isset($_GET["page"])){
  $page=$_GET["page"];
}

$uvjet="";
if(isset($_GET["uvjet"])){
  $uvjet=$_GET["uvjet"];
}


$query = $connect->prepare("
 
 select count(sifra) from igrac where concat(ime, ' ', prezime) like :uvjet;
 ");

$query->execute(array("uvjet"=>"%" . $uvjet . "%")); 
$totalPlayers = $query->fetchColumn();
$totalPages=ceil($totalPlayers/10);
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
  <style>
    .input-group-rounded .input-group-field {
      border-radius: 5000px 0 0 5000px;
      padding-left: 1rem;
    }

    .input-group-rounded .input-group-button .button {
      border-radius: 0 5000px 5000px 0;
      font-size: 0.8rem;
    }
  </style>
</head>
<body>

  <?php
  $query = $connect->prepare("
    select a.sifra,a.ime,a.prezime,a.oib,a.brojtelefona,a.brojregistracije,c.naziv,a.zutikartoni,a.crvenikartoni,a.golovi,
    count(b.igrac) as kategorija from igrac a 
    left join kategorijaigrac b
    on a.sifra=b.igrac
    inner join klub c
    on a.klub=c.sifra
    where concat(a.ime, ' ', a.prezime) like :uvjet  
    group by a.sifra,a.ime,a.prezime,a.oib,a.brojtelefona,a.brojregistracije,c.naziv,
    a.zutikartoni,a.crvenikartoni,a.golovi limit :page, 10
    ");
  $query->bindValue("page",($page*10) - 10,PDO::PARAM_INT);
  $query->bindValue("uvjet","%" . $uvjet . "%");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  ?>
  
  <?php include_once "../../template/sidebar.php"; ?>
  <div class="grid-container full">
    <div class="grid-x align-center">
      <div id="main" class="cell medium-10">
        <a href="new.php" class="button expanded">Dodaj igrača</a>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
          <div class="input-group input-group-rounded">
            <input class="input-group-field" name="uvjet" value="<?php echo $uvjet; ?>" type="search">
            <div class="input-group-button">
              <input type="submit" class="button secondary" value="Traži">
            </div>
          </div>
        </form>
        <table style="border: 0;" class="responsive-card-table unstriped">
          <thead>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Oib</th>
            <th>Broj telefona</th>
            <th>Registracijski broj</th>
            <th>Klub</th>
            <th>Žutih Kartona</th>
            <th>Crvenih kartona</th>
            <th>Golova</th>
            <th>Akcija</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td data-label="Ime"><?php echo $row->ime ?></td>
                <td data-label="Prezime"><?php echo $row->prezime ?></td>
                <td data-label="Oib"><?php echo $row->oib ?></td>
                <td data-label="Broj telefona"><?php echo $row->brojtelefona ?></td>
                <td data-label="Broj Registracije"><?php echo $row->brojregistracije ?></td>
                <td data-label="Klub"><?php echo $row->naziv; ?></td>
                <td data-label="Žutih kartona"><?php echo $row->zutikartoni; ?></td>
                <td data-label="Crvenih kartona"><?php echo $row->crvenikartoni; ?></td>
                <td data-label="Golova"><?php echo $row->golovi; ?></td>
                <td data-label="Akcija"> 
                  <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                    <i class="fas fa-edit fa-2x"></i>
                  </a>
                  <?php if($row->kategorija==0): ?>
                    <a onclick="return confirm('Sigurno obrisati <?php echo $row->ime; ?> <?php echo $row->prezime; ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
                      <i class="fas fa-trash fa-2x"></i>
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <?php 
          if($totalPages==0){
            $totalPages=1;
          }
        ?>

        <nav aria-label="Pagination">
          <ul class="pagination text-center">
            <li class="pagination-previous">
              <a href="index.php?page=<?php echo $page-1; ?>&uvjet=<?php echo $uvjet; ?>" aria-label="Previous page">
                Prethodno <span class="show-for-sr">page</span>
              </a>
            </li>
            <li class="current"><span class="show-for-sr">Trenutno na</span> <?php echo $page; ?>/<?php echo $totalPages; ?></li>
            <li class="pagination-next">
              <a href="index.php?page=<?php echo $page+1; ?>&uvjet=<?php echo $uvjet; ?>" aria-label="Next page">
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
