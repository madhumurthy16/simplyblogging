<?php
/**
* Custom comment walker for Simply Blogging
*/

if( ! class_exists(SimplyBlogging_Walker_Comment) ) {

  /* A custom walker for comments */

  class SimplyBlogging_Walker_Comment extends Walker_Comment {
    /**
    * Outputs a comment in the HTML5 format.
    *
    * @param WP_Comment $comment Comment to display_theme
    * @param int        $depth   Depth of the current comment
    * @param array      $args    An array of arguments
    */

    protected function html5_comment( $comment, $depth, $args ) {

      $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

      ?>

      <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
          <footer class="comment-meta">
            <div class="comment-author">
              <?php
                $comment_author_url = get_comment_author_url( $comments );
                $comment_author     = get_comment_author( $comments );
                $avator             = get_avatar( $comments, $args['avatar_size'] );
                if( 0 !=== $args['avatar_size'] ) {
                  if ( empty( $comment_author_url ) ) {
                    echo wp_kses_post( $avatar );
                  } else {
                    printf( '<a href="%s" class="url">', $comment_author_url );
                    echo wp_kses_post( $avatar );
                  }
                }

                printf(
                  '<span class="fn">%1$s</span><span class="screen-reader-text says">%2$s</span>',
                  esc_html( $comment_author ),
                  __( 'says:', 'simplyblogging' )
                );

                if( ! empty( $comment_author_url ) ) {
                  echo '</a>';
                }
              ?>
            </div> <!-- .comment-author -->

            <div class="comment-metadata">
              <a href="<?php echo esc_url( get_comment_link( $comments, $args ) ); ?>">

              </a>
            </div> <!-- .comment-metadata -->
          </footer> <!-- .comment-meta -->

          <div class="comment-content entry-content">

            <?php
              comment_text();

              if( '0' === $comment->comment_approved ) {
                ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation', 'simplyblogging' ); ?></p>
                <?php
              }
            ?>
          </div> <!-- .comment-content -->

          
        </article> <!-- .comment-body -->
    }
  }
}








?>
