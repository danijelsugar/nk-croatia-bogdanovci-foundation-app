<nav class="top-bar topbar-responsive">
  <div class="top-bar-title">
    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <a class="topbar-responsive-logo" href="#"><img src="https://placehold.it/100x39" alt="" /></a>
  </div>
  <div id="topbar-responsive" class="topbar-responsive-links">
    <div class="top-bar-right">
      <ul class="menu simple vertical medium-horizontal">
        <li><a href="<?php echo $pathAPP; ?>index.php">Naslovna</a></li>
        <li><a href="<?php echo $pathAPP; ?>contact.php">Kontakt</a></li>

        <?php if(isset($_SESSION["a"])): ?>
          <li><a href="<?php echo $pathAPP; ?>/private/dashboard.php">Nadzorna ploča</a></li>
        <?php endif; ?>

        <?php if(isset($_SESSION["a"])): ?>
          <li><a href="<?php echo $pathAPP; ?>logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="<?php echo $pathAPP; ?>login.php">Login</a></li>
        <?php endif; ?>
            <li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

