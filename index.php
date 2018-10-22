<?php include_once "configuration.php"; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
</head>
<body>

  <div class="grid-container full">
    <?php include_once "template/header.php" ?>
    <?php include_once "template/navbar.php"; ?>
    <div class="grid-x">
      <div class="cell small-12 ">
        <div class="background-img">

        </div>
      </div>
    </div>
  </div>
  <div class="grid-container">
    <div class="grid-x standings">
      <?php
        $query = $connect->prepare("select * from klub order by brojbodova desc;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
      ?>
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
              <td data-label="Pozicija"><?php echo $row->pozicija; ?>.</td>
              <td class="popup" id="cell_<?php echo $row->sifra; ?>" data-label="Naziv"><?php echo $row->naziv; ?></td>
              <td data-label="Broj bodova"><?php echo $row->brojbodova; ?></td>
              <td data-label="Zabijenih golova"><?php echo $row->zabijenihgolova; ?></td>
              <td data-label="Primljenih golova"><?php echo $row->primljenihgolova; ?></td>
              <td data-label="Akcija">
                <a href="update.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-edit fa-2x"></i>
                </a>
                <a onclick="return confirm('Sigurno obrisati <?php echo $row->naziv; ?>')" href="delete.php?sifra=<?php echo $row->sifra; ?>">
                  <i class="fas fa-trash fa-2x"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="grid-container full">
    <div class="grid-x counter">
      <div class="cell large-4">
        <div class="counter-box text-center">
          <div class="counter-icon-img">
            <img src="img/football.svg" alt="">
          </div>
          <div class="counter-txt">
            <span class="count">Klubova</span>
            <span class="type">12</span>
          </div>
        </div>
      </div>
      <div class="cell large-4 counter-box">
        <div class="counter-icon-img">
          <img src="img/football-player-setting-ball.svg" alt="">
        </div>
        <div class="counter-txt">
          <span class="count">Igrača</span>
          <span class="type">21</span>
        </div>
      </div>
      <div class="cell large-4 counter-box">
        <div class="counter-icon-img">
          <img src="img/whistle.svg" alt="">
        </div>
        <div class="counter-txt">
          <span class="count">Trenera</span>
          <span class="type">1</span>
        </div>
      </div>
    </div>
    <div class="grid-x">
      <div class="cell large-6 large-offset-3">
        <p>Nogometni klub Croatia Bogdanovci osnovan je 1947. godine pod imenom NK Sremac. Od 1990. godine nosi sadašnji naziv.
          U sezonama 1969/70., 1971/72. i 1982/83. klub osvaja prvenstvo nogometnog saveza područja Vukovara.
          Klub je nekoliko sezona bio član 2. ŽNL, sezone 2012./13. i 2013./14. bio član 1. ŽNL Vukovarsko-srijemska. a trenutno se natječe u Međužupanijskoj nogometnoj ligi Osijek-Vinkovci.</p>
      </div>
    </div>
    <div class="grid-x">
      <div class="cell large-6">
        <div class="" style="padding: 10px 15px;">
          <h3>What is Lorem Ipsum?</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
      <div class="cell large-6">
        <div class="" style="padding: 10px 15px;">
          <h3>Why do we use it?</h3>
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "template/footer.php"; ?>

  <?php include_once "template/scripts.php"; ?>
</body>
</html>
