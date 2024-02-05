<?php
/**
 * EXTRAS
 */

/** Removes access to Appearance>Editor for admin */
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

// ENABLE THIS TO REMOVE ADMIN BAR WHEN LOGGED IN ON THE SITE
// add_filter('wp_head','custom_admin_bar_style_frontend', 99);
function custom_admin_bar_style_frontend() {
    if ( is_super_admin() ) {
        echo '<style type="text/css" media="screen">
                    html { margin-top: 32px !important; height: calc(100% - 32px); }
                    * html body { margin-top: 32px !important; }
                    @media screen and ( max-width: 782px ) {
                        html { margin-top: 46px !important; }
                        * html body { margin-top: 46px !important; height: calc(100% - 32px); }
                    }
                  </style>';
    } else {
        echo '<style type="text/css" media="screen">
                  html { margin-top: 0px !important; }
                  * html body { margin-top: 0px !important; }
                  </style>';
    }
}

function get_all_menu($menu_slug, $order = 'ASC'){
	$menu_name = $menu_slug; //menu slug
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[$menu_name] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array('order' => $order) );

	if($order == 'DESC'){
		return array_reverse($menuitems);
	}else{
		return $menuitems;
	}
}

function dd($data){
	echo '<pre>', var_dump($data), '</pre>';
}

