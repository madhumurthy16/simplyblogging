<?php

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
?>

<footer>
  <!-- Only output the container if there are elements to display. -->

  <?php if( $has_sidebar_1 || $has_sidebar_2 ) ?>
  <div class="footer-widgets-wrapper">
    <?php if( $has_sidebar_1 ) { ?>

      <div class="footer-widgets column-one">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div>

    <?php } ?>

    <?php if ( $has_sidebar_2 ) { ?>

      <div class="footer-widgets column-two">
        <?php dynamic_sidebar( 'sidebar-2' )?>
      </div>

  </div> <!-- .footer-widgets-wrapper -->

  <?php } ?>

  <div>
    <p>&copy;Simply Blogging. Created by, <a href="http://madhumurthy.info">Madhu Murthy.</a></p>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
