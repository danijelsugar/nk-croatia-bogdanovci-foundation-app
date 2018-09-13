<div class="grid-x">
  <div class="cell">
   <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>

  <div class="top-bar align-center" id="main-menu">
    <ul class="menu vertical medium-horizontal medium-text-center" data-responsive-menu="drilldown medium-dropdown">
      <?php
      menuItem($pathAPP, "index.php", "Naslovna");
      menuItem($pathAPP, "contact.php", "Kontakt");


      if(isset($_SESSION["a"])):
        menuItem($pathAPP, "private/dashboard.php", "Nadzorna ploča");
      endif;

      if(isset($_SESSION["a"])): 
        menuItem($pathAPP, "logout.php", "Logout");
      else: 
        menuItem($pathAPP, "login.php", "Login");
      endif; 
      ?>
    </ul>
  </div>
</div>
</div>

