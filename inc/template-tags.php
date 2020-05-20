<?php
/**
* Custom template tags for Simply Blogging
*/

/**
* Comments
*/
/**
* Check if the specified comment is written by the author of the post commented on.
*
* @param object $comment Comment data
* return bool
*/

function simplyblogging_is_comment_by_post_author( $comment = null ) {

  if( is_object( $comment ) && $comment->user_id > 0 ) {

    $user = get_userdata( $comment->user_id );
    $post = get_post( $comment->comment_post_id );

    if( ! empty( $user ) && ! empty( $post ) ) {
      return $comment->user_id === $post->post_author;

    }
  }

  return false;
}
