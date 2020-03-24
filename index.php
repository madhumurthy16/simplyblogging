<?php
/**
* The main template file
*/

get_header();
?>
<div class="container">
  <div class="section-inner">
    <div class="content-outer-wrapper">
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
                $wp_query->found_posts
              );
            }
            else {
              $archive_subtitle = __( 'We could not find any results for your search. You could give it another try through the search form below.', 'sinplyblogging' );
            }
          }
          elseif ( ! is_home() ) {
            $archive_title = get_the_archive_title();
            $archive_subtitle = get_the_archive_description();
          }

          if( $archive_title || $archive_subtitle ) {
            ?>

            <header class="archive-header">
              <div class="archive-header-inner">

              <?php if ( $archive_title ) { ?>
                <h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
              <?php } ?>

              <?php if ( $archive_subtitle ) { ?>
                <div class="archive-subtitle"><?php echo wp_kses_post( $archive_subtitle ); ?></div>
              <?php } ?>

              </div> <!-- .archive-header-inner -->
            </header> <!-- .archive-header -->
          <?php } ?>

          <div class="blog-posts">
            <?php
            if( have_posts() ) {
              $i = 0;
              while( have_posts() ) {
                $i++;
                if( $i > 1 ) {
                  echo '<hr>';
                }
              the_post();
              ?>

              <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                <figure class="featured-media">
                  <div>
                    <?php the_post_thumbnail(); ?>
                  </div> <!-- .featured-media-inner -->
                </figure>

                <header>
                    <p class="categories-list"><?php echo get_the_category_list( ', ' )?></p>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>

                <div class="post-inner">
                  <div class="entry-content">
                    <?php
                      the_excerpt();
                    ?>
                    <p><a href="<?php the_permalink(); ?>">Continue Reading</a></p>
                  </div> <!-- .entry-content -->
                </div> <!-- .post-inner -->

              </article>

            <?php }
            }

            elseif ( is_search() ) {
              ?>

              <div class="no-search-results-form">

                <?php
                get_search_form(
                  array(
                    'label' => __( 'search again', 'simplyblogging' ),
                  )
                );
                ?>
              </div> <!-- .no-search-results-form -->

              <?php
            }
            ?>

          </div> <!-- .blog-posts -->
        </main> <!-- #main-content -->

      </div> <!-- .content-wrapper -->
    </div> <!-- .content-outer-wrapper -->
  </div> <!-- .section-inner -->
</div> <!-- .container -->

<?php
  get_footer();
?>
