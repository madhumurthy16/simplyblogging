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

          <figure class="featured-media">
            <div>
              <?php the_post_thumbnail(); ?>
            </div> <!-- .featured-media-inner -->
          </figure>

          <div class="post-inner">
            <div class="entry-content">
              <?php
                the_content();
              ?>
            </div> <!-- .entry-content -->
          </div> <!-- .post-inner -->

        </article>

      <?php get_template_part( 'template-parts/navigation' ); ?>
      
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
