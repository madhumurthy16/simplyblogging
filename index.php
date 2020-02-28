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
            } ?>
          </div> <!-- .blog-posts -->
        </main> <!-- #main-content -->

      </div> <!-- .content-wrapper -->
    </div> <!-- .content-outer-wrapper -->
  </div> <!-- .section-inner -->
</div> <!-- .container -->

<?php
  get_footer();
?>
