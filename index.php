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
          <th>Gol razlika</th>
          <th>Pobjeda</th>
          <th>Neriješenih</th>
          <th>Poraza</th>
        </thead>
        <tbody>
          <?php $i=1; foreach($result as $row): ?>
            <tr>
              <td data-label="Pozicija"><?php echo $i++; ?>.</td>
              <td class="popup" id="cell_<?php echo $row->sifra; ?>" data-label="Naziv"><?php echo $row->naziv; ?></td>
              <td data-label="Broj bodova"><?php echo $row->brojbodova; ?></td>
              <td data-label="Gol razlika"><?php echo $row->zabijenihgolova; ?>:<?php echo $row->primljenihgolova; ?></td>
              <td data-label="Pobjeda"><?php echo $row->pobjeda; ?></td>
              <td data-label="Neriješenih"><?php echo $row->nerijesenih; ?></td>
              <td data-label="Izgubljenih"><?php echo $row->izgubljenih; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="grid-container full">
    <div class="grid-x counters">
      <div class="cell large-4 counter-box">
        <?php 

            $query = $connect->prepare("select count(sifra) from klub");
            $query->execute();
            $totalClubs = $query->fetchColumn();

        ?>
        <i class="far fa-futbol fa-4x"></i>
        <div class="counter-txt">
          <span class="count"><?php echo $totalClubs; ?></span>
          <span class="type">Klubova</span>
        </div>
      </div>
      <div class="cell large-4 counter-box">  
         <?php 

            $query = $connect->prepare("select count(sifra) from igrac");
            $query->execute();
            $totalPlayers = $query->fetchColumn();
            
        ?>
        <i class="fas fa-users fa-4x"></i>
        <div class="counter-txt">
          <span class="count"><?php echo $totalPlayers; ?></span>
          <span class="type">Igrača</span>
        </div>
      </div>
      <div class="cell large-4 counter-box">
        <?php 

            $query = $connect->prepare("select count(sifra) from trener");
            $query->execute();
            $totalCoach = $query->fetchColumn();
            
        ?>
        <i class="fas fa-flag fa-4x"></i>
        <div class="counter-txt">
          <span class="count"><?php echo $totalCoach; ?></span>
          <span class="type">Trenera</span>
        </div>
      </div>
    </div>
    <div class="grid-x align-center">
      <div class="cell large-6">
        <div class="about-club">
          <h2 class="index-h2">O klubu</h2>
          <p>Nogometni klub Croatia Bogdanovci osnovan je 1947. godine pod imenom NK Sremac. Od 1990. godine nosi sadašnji naziv.
            U sezonama 1969/70., 1971/72. i 1982/83. klub osvaja prvenstvo nogometnog saveza područja Vukovara. Nekadašnji Sremac bilo je svojedobno jedan od najboljih klubova Slavonije i Baranje.
            Klub je nekoliko sezona bio član 2. ŽNL, sezone 2012./13. i 2013./14. bio član 1. ŽNL Vukovarsko-srijemska. a trenutno se natječe u Međužupanijskoj nogometnoj ligi Osijek-Vinkovci.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-container">
    <h2 class="index-h2">Istaknute pobjede</h2>
    <div class="grid-x">
      <div class="cell large-6">
        <div class="" style="padding: 10px 15px;">
          <p>Dana 11.11.1987. je Croatia (tadašnji Sremac) ostvarila jednu od najvećih pobjeda u svojoj dugoj i bogatoj povijesti. Naime, Croatia je tada, kao član Republičke lige, u prijateljskoj utakmici dočekala momčad NK Osijeka, tada člana prve jugoslavenske lige, predvođenu Šukerom, Žeravicom, Rakelom i Alarom. Ekipa Osijeka se pripremala za predstojeći susret s Vardarom a nakon pobjede nad Čelikom od 3-0. Ono što se dogodilo ući će u povijest Croatie kao još jednog dokaza vrijednosti ove ekipe. Nadahnuti domaćini nanijeli su težak poraz Osječanima, poraz koji se i dan danas prepričava među onima koji su bili sudionici toga. Pobjeda nad NK Osijek za kojega je tada nastupao i Davor Šuker od 6:0 je u današnje vrijeme nezamisliva.</p>
        </div>
      </div>
      <div class="cell large-6">
        <div class="" style="padding: 10px 15px;">
          <p>I tadašnji Dinamo iz Vinkovaca koji se plasirao u prvu ligu imao je problema i nije mogao na kraj s Bogdanovčanima. Bez svog najboljeg igrača Halilovića, predvođen Novoselcem i ostalim kvalitetnim igračima nisu imali šanse, dva poraza u dvadesetak dana 5:3, 3:1 doživjeli su od doista izuzetne momčadi iz Bogdanovaca.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="reveal small" id="popisIgraca" data-reveal>
    
    <table>
      <thead>
        <tr>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Zuti kartoni</th>
          <th>Crveni kartoni</th>
        </tr>
      </thead>
      <tbody id="json">
      
      </tbody>
    </table>
   
    
    <button class="close-button" data-close aria-label="Zatvori" type="button">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php include_once "template/footer.php"; ?>

  <?php include_once "template/scripts.php"; ?>
  <script type="text/javascript">
    $(document).ready(function(){
      var sifra;
      $(".popup").click(function(){
        sifra=$(this).attr("id").split("_")[1];
        
        $.ajax({
          type: "POST",
          url: "private/club/popisIgraca.php",
          data: "sifra=" + sifra,
          success: function(data){

            var niz = JSON.parse(data);

            var tbody = document.getElementById("json");
              while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }

            $.each(niz,function(kljuc,vrijednost){
              var tr = document.createElement("tr");

              tr.appendChild(dodajCeliju(vrijednost.ime));
              tr.appendChild(dodajCeliju(vrijednost.prezime));
              tr.appendChild(dodajCeliju(vrijednost.zutikartoni));
              tr.appendChild(dodajCeliju(vrijednost.crvenikartoni));

              tbody.appendChild(tr);
            });
            
           
            $('#popisIgraca').foundation("open");
        }
        });
        return false;
      });

    });


    function dodajCeliju(tekst){
      var td = document.createElement("td");
      var tekst = document.createTextNode(tekst==null ? "" : tekst);
        td.appendChild(tekst);
        return td;
    }
</script>
</body>
</html>
