<?php
  get_header();
?>
<main id="site-content" role="main">

  <?php
  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
    }
  } ?>

  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">
      <div class="entry-head-inner">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php echo get_the_category_list( ', ' )?></p>
      </div> <!-- .entry-head-inner -->
    </header>

    <figure class="featured-media">
      <div class="featured-media-inner">
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
</main>

<?php
  get_footer();
?>
