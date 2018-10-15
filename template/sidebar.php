<nav class="navbar">
  <span class="open-slide">
    <a href="#" onclick="openSlideMenu()">
      <svg width="30" height="30">
          <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
          <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
          <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
      </svg>
    </a>
  </span>
</nav>

<div id="side-menu" class="side-nav">
  <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
  <a href="<?php echo $pathAPP; ?>private/dashboard.php">Nadzorna ploča</a>
  <a href="<?php echo $pathAPP; ?>private/club/index.php">Tablica</a>
  <a href="<?php echo $pathAPP; ?>private/coach/index.php">Treneri</a>
  <a href="<?php echo $pathAPP; ?>private/player/index.php">Igrači</a>
  <a href="<?php echo $pathAPP; ?>private/category/index.php">Kategorija</a>
  <a href="<?php echo $pathAPP; ?>private/match/index.php">Rapored utakmica</a>
  <a href="<?php echo $pathAPP; ?>logout.php">Logout - <?php echo $_SESSION["a"]->ime; ?></a>
</div>

  