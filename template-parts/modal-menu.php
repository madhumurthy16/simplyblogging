<?php
/**
* Displays the menu modal
*
*/
?>

<div class="menu-modal section-inner">
  <nav class="mobile-navigation">
    <ul class="modal-menu reset-list-style">
      <?php wp_nav_menu( array (
        'theme_location' => 'mobile'
      ));
      ?>
    </ul>
  </nav>

  </div> <!-- .menu-modal -->
