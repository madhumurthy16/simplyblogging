<?php
/**
* Displays the menu modal
*
*/
?>

<div class="menu-modal">
  <nav class="mobile-navigation section-inner">
    <ul class="modal-menu reset-list-style">
      <?php wp_nav_menu( array (
        'theme_location' => 'mobile'
      ));
      ?>
    </ul>
  </nav>

  </div> <!-- .menu-modal -->
