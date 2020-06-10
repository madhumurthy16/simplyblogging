<?php
/**
* The template file for displaying the comments and comment form.
*/

/*
*  If the current post is protected by a password and the vistor has not yet entered the
* password we will return early without loading the comments.
*/

if( post_password_required() ) {
  return;
}

if( $comments ) {
  ?>

  <div class="comments" id="comments">

    <?php
    $comments_number = absint( get_comments_number() );
    ?>

    <div class="comments-header">

      <h2 class="comment-reply-title">
      <?php
      if( ! have_comments() ) {
        _e( 'Leave a comment', 'simplyblogging' );
      } elseif ( '1' === $comments_number ) {
        printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'simplyblogging' ), esc_html( get_the_title() ) );
      } else {
        echo sprintf(
          _nx(
            '%1$s reply on &ldquo;%2$s&rdquo;',
            '%1$s replies on &ldquo;%2$s&rdquo;',
            $comments_number,
            'comments title',
            'simplyblogging'
          ),
          number_format_i18n( $comments_number ),
          esc_html( get_the_title() )
        );
      }

      ?>
    </h2> <!-- .comments-title -->

  </div> <!-- .comments-header -->

  <div class="comments-inner">

    <?php
      wp_list_comments(
        array(
          'walker'      => new SimplyBlogging_Walker_Comment(),
          'avatar_size' => 120,
          'style'       => 'div',
        )
      );

      $comment_pagination = paginate_comments_links(
        array(
          'echo'      => false,
          'end_size'  => 0,
          'mid-size'  => 0,
          'next_text' => __( 'Newer Comments', 'simplyblogging' ) . ' <span aria-hidden="true">&rarr;</span>',
          'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'simplyblogging' ),
        )
      );

      if( $comment_pagination ) {
        $paginate_classes = '';

        // If we are only showing the 'Next" link add a class indicating so.
        if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
          $pagination_classes = ' only_next';
        }
        ?>

        <nav class="comments-pagination pagination <?php echo $pagination_classes; ?>" aria-label="<?php esc_attr_e( 'Comments', 'simplyblogging' ); ?>">
          <?php echo wp_kses_post( $comment_pagination ); ?>
        </nav>

        <?php
      }
      ?>

    </div> <!-- .comments-inner -->

  </div> <!-- comments -->

  <?php
}

if( comments_open() || pings_open() ) {

  if( $comments ) {
    echo '<hr class="comment-form-separator" />';
  }

  comment_form(
    array(
        'title_reply_before'     => '<h2 id="reply-title" class="comment-reply-title">',
        'title_repy_after'       => '</h2>',
    )
  );

} elseif( is_single() ) {

  if( $comments ) {
    echo '<hr />';
  }

  ?>

  <div class="comment-respond" id="respond">
    <p class="comments-closed"><?php _e( 'Comments are closed.', 'simplyblogging' ); ?></p>
  </div> <!-- #respond -->

  <?php

}
