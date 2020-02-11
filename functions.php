<?php

/**
 * Table of Contents:
 * Theme Support
 * Register Styles
 * Register Scripts
 * Register Menus
 * Register Sidebars
 */

/**
* Sets up theme defaults and registers support for various WordPress features.
*/

function simplyblogging_theme_support() {
  // Custom background color.
  add_theme_support( 'custom-background', array(
    'default-color' => 'f5efe0',
  ));

  // Set content-width.
  global $content_width;
  if( !isset ( $content_width )) {
    $content_width = 580;
  }

  /*
  * Enable support for Post Thumbnails on posts and pages.
  */

  add_theme_support( 'post-thumbnails' );

  // Set post thumbnail size.
  set_post_thumbnail_size( 1200, 9999 );

  // Custom logo
  $logo_width = 120;
  $logo_height = 90;

  // If the retina setting is active, double the recommeded width and height.
  if( get_theme_mod( 'retina_logo', false )) {
    $logo_width = floor( $logo_width * 2 );
    $logo_height = floor( $logo_height * 2 );
  }

  add_theme_support( 'custom-logo', array (
    'height'      => $logo_height,
    'width'       => $logo_width,
    'flex-height' => true,
    'flex-width'  => true,
  ));

  /*
  * Let WordPress manage the document title.
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

}
add_action( 'after_setup_theme', 'simplyblogging_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */


/**
* Register and Enqueue Styles
*/
function simplyblogging_register_styles() {
  $theme_version = wp_get_theme()->get( 'version' );
  wp_enqueue_style( 'simplyblogging_style', get_stylesheet_uri(), array(), $theme_version );
}

add_action( 'wp_enqueue_scripts', 'simplyblogging_register_styles' );

/**
 * Register and Enqueue Scripts.
 */

 function simplyblogging_register_scripts() {
   $theme_version = wp_get_theme()->get( 'version' );
   wp_enqueue_script( 'simplyblogging-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
 }

 add_action( 'wp_enqueue_scripts', 'simplyblogging_register_scripts' );

 /**
 * Register navigation menus
 */

 function simplyblogging_menus() {
   $locations = array(
     'primary' => __( 'Desktop Menu', 'simplyblogging' ),
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
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'simplyblogging' ) . '</a>';
}

add_action( 'wp_body_open', 'simplyblogging_skip_link', 5 );

/**
* Register widget areas
*/

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplyblogging_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

  // Left Sidebar
  register_sidebar(
    array_merge(
        $shared_args,
        array(
          'name' => __( 'Left Sidebar', 'simplyblogging' ),
          'id'   => 'sidebar-left',
          'description' => __( 'Widgets in this area will be displayed on the left side of the main content.', 'simplyblogging' ),
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

?>
