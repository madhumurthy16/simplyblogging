<?php
/**
* Displays the menu icon and Modal
*
*/
?>

<div class="menu-modal">

  <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

  <div class="site-header__menu group">
    <nav class="mobile-navigation">

      <?php wp_nav_menu( array (
        'theme_location' => 'mobile'
      ));
      ?>
    </nav>
  </div>

</div> <!-- .menu-modal -->
