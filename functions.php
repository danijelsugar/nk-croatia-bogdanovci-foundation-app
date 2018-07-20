<?php 

function menuItem($pathAPP, $currentPage, $label){
        ?>
        <li class="nav-item">
        	<a class="nav-link <?php 
        if ($pathAPP . $currentPage == $_SERVER["PHP_SELF"]){
          echo "active";
        }
        ?>" href="<?php echo $pathAPP . $currentPage; ?>"><?php echo $label; ?></a>
        </li>
        <?php
}