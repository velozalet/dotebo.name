<?php
/**Declare Woocommerce Support, Can be removed if woocommerce is not necessary */
/*
	add_action( 'after_setup_theme', 'woocommerce_support' );
	if ( !function_exists( 'woocommerce_support' ) ) {
	  function woocommerce_support() {
		  add_theme_support( 'woocommerce' );
	  }
	}
*/

/** Navigation locations */
register_nav_menus( array(
	'primary' => __('Primary Menu', 'maxcanvas'),
	'secondary' => __('Footer Menu ', 'maxcanvas'),
	/*
		'footer1' => __('Footer Menu 1', 'maxcanvas'),
		'footer2' => __('Footer Menu 2', 'maxcanvas'),
		'footer3' => __('Footer Menu 3', 'maxcanvas'),
		'footer4' => __('Footer Menu 4', 'maxcanvas')
	*/
) );

/** ACF Pro Global page setup */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('Site settings');
	acf_add_options_sub_page('Header settings');
	acf_add_options_sub_page('Footer settings');
}


require_once('inc/init.php'); //CUSTOM POST TYPE
require_once('inc/wp_enqueue.php'); //SCRIPTS/STYLES
require_once('inc/widgets.php'); //WIDGETS
require_once('inc/extras.php'); //EXTRAS

