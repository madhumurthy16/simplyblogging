<?php
  get_header();
?>
<div class="container">
  <main id="site-content" class="section-inner medium" role="main">

    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
      }
    } ?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <header class="entry-header">
        <div class="entry-header-inner section-inner medium">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php echo get_the_category_list( ', ' )?></p>
        </div> <!-- .entry-head-inner -->
      </header>

      <figure class="featured-media">
        <div class="featured-media-inner section-inner medium">
          <?php the_post_thumbnail(); ?>
        </div> <!-- .featured-media-inner -->
      </figure>

      <div class="post-inner">
        <div class="entry-content section-inner small">
          <?php
            the_content();
          ?>
        </div> <!-- .entry-content -->
      </div> <!-- .post-inner -->

    </article>
  </main> <!-- #site-content -->

  <aside id="sidebar-right section-inner">
    <?php dynamic_sidebar( 'sidebar-right' ); ?>
  </aside>
</div> <!-- .container -->

<?php
  get_footer();
?>
