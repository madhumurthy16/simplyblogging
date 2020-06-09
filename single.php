<?php
/**
* Single blog post template
*/

get_header();
?>
<div class="container">
  <div class="section-inner">
    <div class="content-wrapper">

      <main id="main-content" role="main">

        <?php
        if( have_posts() ) {
          while( have_posts() ) {
            the_post();
          }
        } ?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

          <header class="entry-header">
              <h2 class="entry-title"><?php the_title(); ?></h2>
              <p class="categories-list"><?php echo get_the_category_list( ', ' )?></p>
          </header>

          <?php if( has_post_thumbnail() && ! post_password_required() ) { ?>

            <figure class="featured-media">
              <div class="featured-media-image">
                <?php the_post_thumbnail(); ?>
                <div class="image-overlay">
                </div>
              </div> <!-- .featured-media-image -->
            </figure> <!-- .featured-media -->

          <?php
          } ?>

          <div class="post-inner">
            <div class="entry-content">
              <?php
                the_content();
              ?>
            </div> <!-- .entry-content -->
          </div> <!-- .post-inner -->

        </article>

      <?php get_template_part( 'template-parts/navigation' );

      /**
      * Output comments wrapper if it's a post, or if comments are open,
      * or if there's a comment number - and check for password.
      * */
      if( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
        ?>

        <div class="comments-wrapper">

          <?php comments_template() ?>

        </div> <!-- .comments-wrapper -->

        <hr>

        <?php
      }
      ?>

      </main> <!-- #site-content -->

      <aside id="sidebar-right">
        <?php dynamic_sidebar( 'sidebar-right' ); ?>
      </aside>

    </div> <!-- .content-wrapper -->
  </div> <!-- .section-inner -->
</div> <!-- .container -->

<?php
  get_footer();
?>
