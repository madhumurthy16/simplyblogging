<?php
/**
* The template for displaying the footer.
* use the styles in #site-footer for .footer-credits.
* In my version, #site-footer will have general footer styles like fonts and background color...
*/

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
?>

<footer id="site-footer" role="contentinfo" class="header-footer-group">
  <div class="section-inner">
  <!-- Only output the container if there are elements to display. -->

    <?php if( $has_sidebar_1 || $has_sidebar_2 ) { ?>

    <div class="footer-widgets-outer-wrapper">

      <div class="footer-widgets-wrapper">

        <?php if( $has_sidebar_1 ) { ?>

          <div class="footer-widgets column-one grid-item">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
          </div>

        <?php } ?>

        <?php if ( $has_sidebar_2 ) { ?>

          <div class="footer-widgets column-two grid-item">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
          </div>

        <?php } ?>

      </div> <!-- .footer-widgets-wrapper -->

    </div> <!-- .footer-widgets-outer-wrapper -->

    <?php } ?>

    <div class="footer-credits">

      <p class="footer-copyright">&copy;
        <?php echo date_i18n(
          /* translators: Copyright date format, see https://secure.php.net/date */
          _x( 'Y', 'copyright date format', 'simplyblogging' )
        );
        ?>
        <a href="<?php echo esc_url( home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a>
      </p> <!-- .footer-copyright -->

    </div> <!-- .footer-credits -->

  </div> <!-- .section-inner -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
