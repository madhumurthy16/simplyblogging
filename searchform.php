<?php
/** The searchform.php template.
*
* Used any time that get_search_form() is called.

*/

/*
* Generate a unique ID for each form.
*/

$unique_id = wp_unique_id('search-form-');
?>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="<?php echo esc_attr( $unique_id ); ?>">
    <span class="screen-reader-text"><?php _e( 'Search for:', 'simplyblogging' ); ?></span>
    <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="Search &hellip;" value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
