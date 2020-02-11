<?php
  get_header();
?>

<aside>
  <?php dynamic_sidebar( 'sidebar-left' ); ?>
</aside>

<main id="site-content" role="main">

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

      <header class="entry-header">
        <div class="entry-header-inner">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php echo get_the_category_list( ', ' )?></p>
        </div> <!-- .entry-header-inner -->
      </header> <!-- .entry-header -->

      <figure class="featured-media">
        <div class="featured-media-inner">
          <?php the_post_thumbnail(); ?>
        </div> <!-- .featured-media-inner -->
      </figure>

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

</main> <!-- #site-content -->

<?php
  get_footer();
?>
