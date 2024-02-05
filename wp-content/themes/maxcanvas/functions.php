<?php
/**
 * maxcanvas functions and definitions
 *
 * @package maxcanvas
 */

if ( ! isset( $content_width ) ) $content_width = 1200;

if ( ! function_exists( 'maxcanvas_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function maxcanvas_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on maxcanvas, use a find and replace
     * to change 'maxcanvas' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'maxcanvas', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'maxcanvas_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );
  }
endif; // maxcanvas_setup
add_action( 'after_setup_theme', 'maxcanvas_setup' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Add thumbnail support for the blog
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

if ( ! function_exists( 'remove_thumbnail_dimensions' ) ) :
  function remove_thumbnail_dimensions( $html ) {
      $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
      return $html;
  }
endif;

add_theme_support( 'post-thumbnails' );

if ( ! function_exists( 'maxcanvas_scripts_styles' ) ) :
  function maxcanvas_scripts_styles() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'starter-style', get_stylesheet_uri() );

    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );

    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), false, true);
    //wp_enqueue_script( 'boostrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );

    //wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

    //wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  }
endif;
add_action( 'wp_enqueue_scripts', 'maxcanvas_scripts_styles' );



