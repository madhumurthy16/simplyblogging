<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset=<?php bloginfo( 'charset' ); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="site-header" role="banner">

      <div class="header-inner section-inner">

        <div class="header-titles-wrapper">

          <div class="header-titles">

            <h1 class="site-title"><a href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
            <div class="site-description"><?php echo get_bloginfo( 'description' ); ?></div>
          </div> <!-- .header-titles -->

        </div> <!-- .header-titles-wrapper -->
    </div> <!-- .header-inner -->
  </header>
