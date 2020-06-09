<?php
/**
* The main template file
*/

get_header();
?>
<div class="container">
  <div class="section-inner">
    <div class="content-wrapper">

      <aside id="sidebar-left">
        <?php dynamic_sidebar( 'sidebar-left' ); ?>
      </aside>

      <main id="main-content" role="main">

        <?php

        $archive_title = '';
        $archive_subtitle = '';

        if ( is_search() ) {
          global $wp_query;

          $archive_title = sprintf(
            '%1$s %2$s',
            '<span class="color-accent">' . __( 'Search:', 'simplyblogging' ) . '</span>',
            '&ldquo;' . get_search_query() . '&rdquo;'
          );

          if ( $wp_query->found_posts ) {
            $archive_subtitle = sprintf(
              _n(
                'We found %s result for your search.',
                'We found %s results for your search.',
                $wp_query->found_posts,
                'simplyblogging'
              ),
              number_format_i18n( $wp_query->found_posts )
            );
          }
          else {
            $archive_subtitle = __( 'We could not find any results for your search. You could give it another try through the search form above or browse through the categories on the left.', 'sinplyblogging' );
          }
        }
        elseif ( ! is_home() ) {
          $archive_title = get_the_archive_title();
          $archive_subtitle = get_the_archive_description();
        }

        if( $archive_title || $archive_subtitle ) {
          ?>

          <header class="archive-header">
            <!-- <div class="archive-header-inner"> -->

            <?php if ( $archive_title ) { ?>
              <h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
            <?php } ?>

            <?php if ( $archive_subtitle ) { ?>
              <div class="intro-text"><?php echo wp_kses_post( $archive_subtitle ); ?></div>
            <?php } ?>

            <!-- </div> --> <!-- .archive-header-inner -->
          </header> <!-- .archive-header -->
        <?php } ?>

        <?php
        if( have_posts() ) { ?>
          <div class="blog-posts">
          <?php
          $i = 0;
          while( have_posts() ) {
            $i++;
            if( $i > 1 ) {
              echo '<hr>';
            }
          the_post();
          ?>

          <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <?php if( has_post_thumbnail( ) && ! post_password_required() ) { ?>

              <figure class="featured-media">
                <div class="featured-media-image">
                  <?php the_post_thumbnail(); ?>
                  <div class="image-overlay">
                    <a class="image-overlay-link" href="<?php the_permalink(); ?>">Read Post</a>
                  </div>
                </div> <!-- .featured-media-image -->
              </figure> <!-- .featured-media -->
              <?php
            } ?>

            <header>
                <p class="categories-list"><?php echo get_the_category_list( ', ' )?></p>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="post-inner">
              <div class="entry-content">
                <?php
                  the_excerpt();
                ?>
                <p><a class="read-more-link" href="<?php the_permalink(); ?>">Continue Reading</a></p>
              </div> <!-- .entry-content -->
            </div> <!-- .post-inner -->

          </article>


        <?php }
        }
        ?>
        </div> <!-- .blog-posts -->

        <?php get_template_part( 'template-parts/pagination' ); ?>

      </main> <!-- #main-content -->

    </div> <!-- .content-wrapper -->
  </div> <!-- .section-inner -->
</div> <!-- .container -->



<?php
  get_footer();
?>
