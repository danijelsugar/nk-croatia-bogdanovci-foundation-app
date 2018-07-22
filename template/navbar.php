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
        <?php
          menuItem($pathAPP, "index.php", "Naslovna");
          menuItem($pathAPP, "contact.php", "Kontakt");


          if(isset($_SESSION["a"])):
            menuItem($pathAPP, "private/dashboard.php", "Nadzorna ploča");
            menuItem($pathAPP, "private/club/index.php", "Klubovi");
            menuItem($pathAPP, "private/coach/index.php", "Treneri");
          endif;
        ?>

        <?php 
          if(isset($_SESSION["a"])): 
            menuItem($pathAPP, "logout.php", "Logout");
          else: 
            menuItem($pathAPP, "login.php", "Login");
          endif; 
        ?>
            <li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

