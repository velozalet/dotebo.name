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


/** ADD CPT "projects" and taxonomy for them */
function projects_cpt() {
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name'),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name'),
		'menu_name'           => __( 'Projects'),
		'parent_item_colon'   => __( 'Parent Project'),
		'all_items'           => __( 'All Projects'),
		'view_item'           => __( 'View Project'),
		'add_new_item'        => __( 'Add New Project'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Project'),
		'update_item'         => __( 'Update Project'),
		'search_items'        => __( 'Search Project'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	$args = array(
		'label'               => __( 'Projects'),
		'description'         => __( 'Project'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
		'taxonomies'          => array( 'projects-taxonomy' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 3.1,
		'can_export'          => true,
		'has_archive'         => false,
		'rewrite' => ['slug'=>'projects'],
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-portfolio',
	);
	register_post_type( 'projects', $args );
} add_action( 'init', 'projects_cpt', 0 );
function projects_cpt_taxonomy() {
	register_taxonomy(
		'projects-taxonomy',
		'projects',
		array(
			'hierarchical' => true,
			'label' => 'Projects Category',
			'query_var' => true,
			'has_archive' => false,
			'exclude_from_search' => true,
			'show_in_rest'  => true
		)
	);
} add_action( 'init', 'projects_cpt_taxonomy');
/**__/ADD CPT "projects" and taxonomy for them */

/** ADD CPT "services" and taxonomy for them */
function services_cpt() {
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name'),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name'),
		'menu_name'           => __( 'Services'),
		'parent_item_colon'   => __( 'Parent Service'),
		'all_items'           => __( 'All Services'),
		'view_item'           => __( 'View Service'),
		'add_new_item'        => __( 'Add New Service'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Service'),
		'update_item'         => __( 'Update Service'),
		'search_items'        => __( 'Search Service'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	$args = array(
		'label'               => __( 'Services'),
		'description'         => __( 'Service'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
		'taxonomies'          => array( 'services-taxonomy' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 3.1,
		'can_export'          => true,
		'has_archive'         => false,
		'rewrite' => ['slug'=>'services'],
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-archive',
	);
	register_post_type( 'services', $args );
} add_action( 'init', 'services_cpt', 0 );
function services_cpt_taxonomy() {
	register_taxonomy(
		'services-taxonomy',
		'services',
		array(
			'hierarchical' => true,
			'label' => 'Services Category',
			'query_var' => true,
			'has_archive' => false,
			'exclude_from_search' => true,
			'show_in_rest'  => true
		)
	);
} add_action( 'init', 'services_cpt_taxonomy');
/**__/ADD CPT "services" and taxonomy for them */