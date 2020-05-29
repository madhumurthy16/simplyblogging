<?php
/**
* The template for displaying the 404 template in Simply Blogging theme.
*
*/

get_header();
?>

<div class="container">
  <div class="section-inner">
    <div class="content-wrapper">

      <main id="main-content" role="main">

        <div class="section-inner thin error404-content">

          <h1 class="entry-title"><?php _e( 'Page Not Found', 'simplyblogging' ); ?></h1>

          <div class="intro-text">
            <p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'simplyblogging' ); ?></p>
          </div> <!-- .intro-text -->

        </div> <!-- .setion-inner -->

      </main> <!-- #site-content -->

    </div> <!-- .content-wrapper -->
  </div> <!-- .section-inner -->
</div> <!-- .container -->

<?php
  get_footer();
