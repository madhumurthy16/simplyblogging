<?php
/** Simply Blogging functions and definitions
*/

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Register Sidebars
 * Custom excerpt length
 * Custom comment form fields order
 */

/**
* Sets up theme defaults and registers support for various WordPress features.
*/

function simplyblogging_theme_support() {

  // Set content-width.
  global $content_width;
  if( !isset ( $content_width )) {
    $content_width = 912;
  }

  /*
  * Enable support for Post Thumbnails on posts and pages.
  */

  add_theme_support( 'post-thumbnails' );

  // Set post thumbnail size ( Featured Image )
  set_post_thumbnail_size( 912, 9999 );

  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
  add_theme_support( 'title-tag' );

  /*
  * Switch default core markup for search form, comment form, and comments to
  * output valid HTML5
  */

  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'script',
    'style',
  ));

  /*
  * Make theme available for translation.
  */
  load_theme_textdomain( 'simplyblogging' );

}

add_action( 'after_setup_theme', 'simplyblogging_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */

 require get_template_directory() . '/inc/template-tags.php';

 // Custom comment walker
require get_template_directory() . '/classes/class-simplyblogging-walker-comment.php';

/**
* Register and Enqueue Styles
*/
function simplyblogging_register_styles() {

  $theme_version = wp_get_theme()->get( 'version' );

  wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600,700,700i,800' );

  wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.13.0/css/all.css');

  wp_enqueue_style( 'simplyblogging_style', get_stylesheet_uri(), array(), $theme_version );
}

add_action( 'wp_enqueue_scripts', 'simplyblogging_register_styles' );

/**
 * Register and Enqueue Scripts.
 */

 function simplyblogging_register_scripts() {

   $theme_version = wp_get_theme()->get( 'version' );

   /* Enqueue script (comment-reply.js) to display the form next to the comment being replied to.
   /* This JavaScript file comes with WordPress */

   if( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
     wp_enqueue_script( 'comment-reply' );
   }

   wp_enqueue_script( 'simplyblogging-js', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), $theme_version, true );

 }

 add_action( 'wp_enqueue_scripts', 'simplyblogging_register_scripts' );

 /**
 * Register navigation menus
 */

 function simplyblogging_menus() {
   $locations = array(
     'mobile'  => __( 'Mobile Menu', 'simplyblogging' ),
     'footer'  => __( 'Footer Menu', 'simplyblogging' ),
     'social'  => __( 'Social Menu', 'simplyblogging' ),
   );
   register_nav_menus( $locations );
 }

 add_action( 'init', 'simplyblogging_menus' );

 if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function simplyblogging_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#main-content">' . __( 'Skip to the content', 'simplyblogging' ) . '</a>';
}

add_action( 'wp_body_open', 'simplyblogging_skip_link', 5 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplyblogging_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

  // Left Sidebar
  register_sidebar(
    array_merge(
        $shared_args,
        array(
          'name' => __( 'Categories Sidebar', 'simplyblogging' ),
          'id'   => 'sidebar-categories',
          'description' => __( 'This area will display the categories widget on the left side of the main content and in the mobile menu.', 'simplyblogging' ),
      )
    )
  );

  // Right Sidebar
  register_sidebar(
    array_merge(
        $shared_args,
        array(
          'name' => __( 'Right Sidebar', 'simplyblogging' ),
          'id'   => 'sidebar-right',
          'description' => __( 'Widgets in this area will be displayed on the right side of the main content.', 'simplyblogging' ),
      )
    )
  );

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'simplyblogging' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'simplyblogging' ),
			)
		)
	);

  // Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'simplyblogging' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'simplyblogging' ),
			)
		)
	);

}

add_action( 'widgets_init', 'simplyblogging_sidebar_registration' );

// Add custom excerpt length
function simplyblogging_custom_excerpt_length( $length ) {
  return 20;
}

add_filter( 'excerpt_length', 'simplyblogging_custom_excerpt_length', 999 );

// Remove custom comment form fields and reorder fields

function simplyblogging_comment_fields_custom_order( $fields ) {
  $comment_field = $fields['comment'];
  $cookies_field = $fields['cookies'];
  // Remove fields
  unset( $fields['comment']);
  unset( $fields['url']);
  unset( $fields['cookies']);
  // Add comment field to the end of the form
  $fields['comment'] = $comment_field;
  $fields['cookies'] = $cookies_field;
  return $fields;
}

add_filter( 'comment_form_fields', 'simplyblogging_comment_fields_custom_order' );
