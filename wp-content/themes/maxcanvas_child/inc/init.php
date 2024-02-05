<?php
/**
 * HOLDS CUSTOM POST TYPES, TAXONOMIES, etc.
 */

define('THEME_URL', get_bloginfo('stylesheet_directory'));
define('THEME_PATH', get_stylesheet_directory());

/** Add `excerpt` for Posts & Pages*/
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );
/**__/Add `excerpt` for Posts & Pages*/

/** Add featured image for Posts to REST API*/
function register_rest_images(){
	register_rest_field( array('post'),
		'fimg_url',
		array(
			'get_callback'    => 'get_rest_featured_image',
			'update_callback' => null,
			'schema'          => null,
		)
	);
} add_action('rest_api_init', 'register_rest_images' );
function get_rest_featured_image( $object, $field_name, $request ) {
	if( $object['featured_media'] ){
		$img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
		return $img[0];
	}
	return false;
}
/**__/Add featured image for Posts to REST API*/
