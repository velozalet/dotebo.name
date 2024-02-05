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

/** Add the ability to set class for the <li> elements in the Menu - 'add_li_class' setting is now available */
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
/** Add the ability to set class for the <a> elements in the Menu - 'link_class' setting is now available */
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}

/** !!!!!!!!!!!!!!!!!! */
/*
	class Custom_Submenu_Container extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<div class='menu__dropdown'><div class='menu__grid'><div class='menu__col'><ul class='menu__sub-list'>\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul></div></div></div>\n";
		}
	}
*/

/** Var dump description
 * @param $data ( var_dump() )
 */
function dd($data){
	echo '<pre>', var_dump($data), '</pre>';
}

/** Get a numbers from string and implode result to new string
 * @param $str
 * @return string
 */
function get_numerics($str) {
	preg_match_all('/\d+/', $str, $matches);
	return implode("",$matches[0]);
}

/** Сut a string to a specific length
	@param $string(string) - incoming string
	@param $length(int) - the length of the string you want to have
	@return (string) - output string
 */
function cut_string($string,$length){
	$string = strip_tags($string);
	$string = mb_substr($string, 0, $length,'UTF-8');
	$position = mb_strrpos($string, ' ', 0);
	$string = mb_substr($string, 0, $position, 'UTF-8');
	$string = rtrim($string, "?!,.-");
	$string .= ' ...';
	return $string;
}

/** Get featured image of Post/Page by ID
 * @param $id (int) - ID of Post/Page
 * @return false|string
 */
function get_featured_img_by_id($id){
	return wp_get_attachment_url( get_post_thumbnail_id($id) );
}


/** Get All Menu from DB
 * @param $menu_slug (str) - slug/identificator for Menu when registering a menu register_nav_menus()
 * @param $order (str) - sorting direction - 'ASC' / 'DESC'
 * @return array
 */
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
} //Call: get_all_menu('primary'); / get_all_menu('primary','DESC');

/** Get sub menu items for main menu item
 * @param  $all_menu_arr (arr) - All Menu from get_all_menu() function
 * @param $ID_menuitem (int) - ID menu item for which to needs sub-items
 * @param $order (str) - sorting direction - 'ASC' / 'DESC'
 * @return array
 */
function get_subitems_for_menuitem($all_menu_arr, $ID_menuitem, $order= 'ASC'){
	$result = [];
	foreach( $all_menu_arr as $item_sub_menu ){
		if( $item_sub_menu-> menu_item_parent == $ID_menuitem ){ array_push($result, $item_sub_menu); }
	}

	if($order == 'DESC'){
		return array_reverse($result);
	}else{
		return $result;
	}
} //Call: get_subitems_for_menuitem($menuitems, 55); / get_subitems_for_menuitem($menuitems, 55, 'DESC');

/** Get embed link to YouTube video from original link YouTube video
 * @param $original_youtube_link (str)
 * @return str
 */
function get_embed_link_youtube($original_youtube_link){
	return str_replace("watch?v=","embed/", $original_youtube_link);
}

/** Get needs posts
 * @param $post_type(str) - slug of custom Post Type or simple posts
 * @param $numberposts(int) - number of posts shown
 * @param $category(int) - Category ID to get posts from
 * @param $category_name(str) - Show posts only from this category (the name or alternative name (slug) of the category is indicated)
 * @param $orderby(str) - Sort by: author/date/ID/rand/title/type....
 * @param $order(str) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 * @return array
 */
function get_needs_posts($post_type, $numberposts, $category, $category_name, $orderby, $order){
	$posts = get_posts( array(
		'numberposts' => $numberposts,
		'category'    => $category,
		'category_name' => $category_name,
		'orderby'     => $orderby,
		'order'       => $order,
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => $post_type,
		'suppress_filters' => false,
	) );
	return $posts;
} //Call: get_needs_posts('shows', -1, 0, '', 'date', 'DESC') / get_needs_posts('shows', -1, 0, '', 'date', 'ASC') / get_needs_posts('cases', 2, 0, '', 'date', 'DESC')

/** Get All posts for pagination
 * @param $post_type(str) - slug of custom Post Type or simple posts
 * @param $posts_per_page(int) - how many posts will be displayed on 1 page
 * @param $post_status(str) - status of Post( publish/privat... )
 * @param $category(int) - Category ID to get posts from
 * @param $category_name(str) - Show posts only from this category (the name or alternative name (slug) of the category is indicated)
 * @param $orderby(str) - Sort by: author/date/ID/rand/title/type....
 * @param $order(str) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 * @return array
 */
function get_posts_for_pagination($post_type, $posts_per_page, $post_status, $category, $category_name, $orderby, $order){
	$posts = get_posts( array(
		'post_status' => $post_status,
		'category'    => $category,
		'category_name' => $category_name,
		'orderby'     => $orderby,
		'order'       => $order,
		'post_type'   => $post_type,
		'posts_per_page' => $posts_per_page,
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ), //'paged' - which page to start from, usually from the 1st
		/*'suppress_filters' => false,*/
	) );
	return $posts;
} //Call: get_posts_for_pagination('post', 1, 'publish', 0, '', 'date', 'ASC') | get_posts_for_pagination('post', 1, 'publish', 0, '', 'date', 'DESC')

/** Custom pagination (my custom solution via the method `get_posts()`) without the ability to set how many pagination points to display to the left/right of the current active page
 * @param $posts_per_page(int) - how many posts will be displayed on 1 page
 * @param $post_type(str) - slug of custom Post Type or simple posts
 * @param $post_status(str) - status of Post( publish/privat... )
 * @param $category(int) - Category ID to get posts from
 * @param $category_name(str) - Show posts only from this category (the name or alternative name (slug) of the category is indicated)
 * @param $orderby(str) - Sort by: author/date/ID/rand/title/type....
 * @param $order(str) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 * @param $page_pagination_part(str) - part of the URL that will participate in the formation of the URL pagination pages: /blog/ or /news/  --> DOMAIN/news/page/2/ | DOMAIN/news/page/3/ .. etc..
 */
function posts_navigation_simple($posts_per_page, $post_type, $post_status, $category, $category_name, $orderby, $order, $page_pagination_part){
	echo '<ul class="pagination"> <!-- pagination-lg or pagination-sm -->';

	//echo '<pre>';var_dump( count($all_posts) );echo '</pre>';
	//1.total number of posts
	$all_posts_for_count = get_posts(
		array(
			'post_type' => $post_type,
			'post_status' => $post_status,
			'category'    => $category,
			'category_name' => $category_name,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $posts_per_page,
		)
	);
	$all_posts_cnt = count($all_posts_for_count); //13 - total number of posts

	//2.how many pages should total?
	//(!)в $all_posts где основной цикл вывода постов, как раз таки установлен 'posts_per_page'=>'4' поэтому сосчитав эти посты я получу разбивку по кол-ву на 1 стр.
	$pages_cnt_total = $all_posts_cnt/$posts_per_page; //3.25
	//2.1.separate the decimal part of result
	$decimal_part = floor($pages_cnt_total); //3
	if( $pages_cnt_total == $decimal_part ){
		$pages_cnt_total = $decimal_part;
	}elseif( $pages_cnt_total > $decimal_part && $pages_cnt_total < $decimal_part + 1 ){
		$pages_cnt_total = $decimal_part + 1;
	} /*(!)And now in $pages_cnt_total contains the estimated number of pages*/

	//3.берем параметр,который отвечает за страницу из query string,чтобы отслеживать текуций номер страницы
	//var_dump( home_url( $_SERVER['REQUEST_URI'] ) ); //OR: get_pagenum_link(get_query_var('paged'))
	/*Также можно брать от сюда информацию о текущем URL и запросе:
		global $wp; $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	*//*Но в данном случае нам удобнее всего брать просто цифру из query string, - она находится тут: get_query_var('paged') */
	$current_page_number = get_query_var('paged'); //var_dump($current_page_number)


	/*(!) printf() - outputs a formatted string:
		%s -string;
		%d -signed decimal number (negative,zero or positive);  %u -unsigned decimal number (equal to or greather than zero)
		%f -floating-point number (local settings aware);  %F -floating-point number (not local settings aware)
	*/
	if( $current_page_number > 1 ):
		printf(
			'<li class="page-item">
            <a class="page-link" href="%spage/%s/" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>
        </li>', home_url($page_pagination_part), ($current_page_number - 1)
		);
	endif;

	for($cnt_iteration = 0; $cnt_iteration <= $pages_cnt_total; $cnt_iteration++):
		if( !$cnt_iteration == 0):
			if( $current_page_number == 0 ){ $current_page_number = 1; }

			if( $current_page_number === $cnt_iteration ){
				printf('<li class="page-item active"><span class="page-link">%u</span></li>',$current_page_number);
			}else{
				printf(
					'<li class="page-item"><a class="page-link" href="%spage/%u/">%u</a></li>', home_url($page_pagination_part), $cnt_iteration, $cnt_iteration
				);
			}
		endif;
	endfor;

	//пока номер текущей страницы не превышает общее кол-во страниц, показываем элемент "Next"
	if( $current_page_number < $pages_cnt_total ):
		printf(
			'<li class="page-item">
            <a class="page-link" href="%spage/%u/" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a>
        </li>', home_url($page_pagination_part), ($current_page_number + 1)
		);
	endif;
	echo '</ul>';
} //Call: posts_navigation_simple(1, 'post', 'publish', 0, '', 'date', 'ASC', '/blog/') | posts_navigation_simple(1, 'post', 'publish', 0, '', 'date', 'DESC', '/news/')

/** Custom pagination (cool solution via `WP_Query()`) with ability to set how many pagination points to display to the left/right of the current active page(!)
 * @param $posts_per_page(int) - how many posts will be displayed on 1 page
 * @param $post_type(str) - slug of custom Post Type or simple posts
 * @param $post_status(str) - status of Post( publish/privat... )
 * @param $category(int) - Category ID to get posts from
 * @param $category_name(str) - Show posts only from this category (the name or alternative name (slug) of the category is indicated)
 * @param $orderby(str) - Sort by: author/date/ID/rand/title/type....
 * @param $order(str) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 */
function posts_navigation($posts_per_page, $post_type, $post_status, $category, $category_name, $orderby, $order){
	$args =  array(
		'post_type' => $post_type,
		'post_status' => $post_status,
		'category'    => $category,
		'category_name' => $category_name,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $posts_per_page,
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
	);
	$query = new WP_Query($args);
	$max_num_pages = $query->max_num_pages;

	/**Stop execution if there's only 1 page*/
	if( $max_num_pages <= 1 ){ return; }
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	/** Add current page to the array */
	if ( $paged >= 1 ){ $links[] = $paged; }
	/**Add the pages around the current page to the array*/
	if( $paged >= 3 ){
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if( ( $paged + 2 ) <= $max_num_pages ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	/*(!) printf() - outputs a formatted string:
		%s -string;
		%d -signed decimal number (negative,zero or positive);  %u -unsigned decimal number (equal to or greather than zero)
		%f -floating-point number (local settings aware);  %F -floating-point number (not local settings aware)
	*/
	echo '<ul class="pagination"> <!-- pagination-lg or pagination-sm -->' . "\n";
	/**Previous Post Link*/
	if( get_previous_posts_link('Prev', $max_num_pages) ){ printf( '<li>%s</li>' . "\n", get_previous_posts_link('Prev', $max_num_pages) ); }

	/**Link to first page, plus ellipses if necessary*/
	if ( !in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active++"' : '';
		printf( '<li class="page-item" %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link(1 ) ), '1' );
		if ( ! in_array( 2, $links ) )
			echo '<li style="margin:0 5px; font-size:1.2rem;">. . .</li>';
	}

	/**Link to current page, plus 2 pages in either direction if necessary*/
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="page-item active"' : '';
		printf( '<li %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link($link) ), $link );
	}
	/**Link to last page, plus ellipses if necessary*/
	if ( ! in_array( $max_num_pages, $links ) ) {
		if ( ! in_array( $max_num_pages - 1, $links ) )
			echo '<li style="margin:0 5px; font-size:1.2rem;">. . .</li>' . "\n";
		$class = $paged == $max_num_pages ? ' class="active"' : '';
		printf( '<li class="page-item" %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link($max_num_pages) ), $max_num_pages );
	}

	/** Next Post Link */
	if( get_next_posts_link('Next', $max_num_pages) ){ printf( '<li>%s</li>' . "\n", get_next_posts_link('Next', $max_num_pages) ); }
	echo '</ul>' . "\n";
} //Call: posts_navigation(1, 'post', 'publish', 0, '', 'date', 'ASC') |  posts_navigation(1, 'post', 'publish', 0, '', 'title', 'DESC')


/** Get all categories of CPT
 * @param $taxonomy (string) - The name of the registered taxonomy whose categories needed to get
 * @param $orderby (string) - Sort by: author/date/ID/rand/title/name/type....
 * @param $order (string) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 * @return array
 */
function get_categories_of_cpt($taxonomy, $orderby, $order){
	$args = array(
		'taxonomy' => $taxonomy,
		'orderby' => $orderby,
		'order'   => $order
	);
	return get_categories($args);
}

/** Get categories of CPT by ID Post
 * @param $post_id (int) - id of Custom Post Type
 * @param $cpt_taxonomy_name (string) - The name of the registered taxonomy for this CPT
 * @return false|array
 */
function get_categories_of_cpt_by_id($post_id, $cpt_taxonomy_name){
	return get_the_terms($post_id, $cpt_taxonomy_name );
} //Call: get_categories_of_cpt_by_id(928, 'news-taxonomy') | get_categories_of_cpt_by_id(928, 'services-taxonomy')

/** Get categories list of CPT by ID Post
 * @param $post_id (int) - id of Custom Post Type
 * @param $cpt_taxonomy_name (string) - The name of the registered taxonomy for this CPT
 * @return false|string
 */
function get_categories_list_of_cpt_by_id ($post_id, $cpt_taxonomy_name){
	return strip_tags( get_the_term_list($post_id, $cpt_taxonomy_name, '', ',', '') );
} //Call: get_categories_list_of_cpt_by_id(928, 'news-taxonomy', '', ',', '') | get_categories_list_of_cpt_by_id(928, 'services-taxonomy', '', ';', '')


/** Custom navigation(not pagination as in functions `posts_navigation()` and `posts_navigation_simple()`) for CPT
 * @param $current_postId(int) - current Post ID
 * @param $post_type(str) - slug/identificator of the registered name of CPT
 * @param $taxonomy_name(str) - The name of the registered taxonomy for this CPT
 * @param $post_status(str) - status of Post( publish/privat... )
 * @param $category(int) - Category ID to get posts from
 * @param $category_name(str) - Show posts only from this category (the name or alternative name (slug) of the category is indicated)
 * @param $orderby(str) - Sort by: author/date/ID/rand/title/type....
 * @param $order(str) - Sort direction: 'ASC' - from smallest to largest; 'DESC' - from largest to smallest
 */
function navigation_bar_of_cpt($current_postId, $post_type, $taxonomy_name, $post_status, $category, $category_name, $orderby, $order){
	/*(!)https://stackoverflow.com/questions/29903083/wp-navigation-post-of-a-custom-post-type*/
	$posts_per_page = -1; //all posts
	//1.Get Custom Posts in same Custom taxonomy
	$postlist_args = array(
		'posts_per_page' => $posts_per_page,
		'post_type'      => $post_type,
		'taxonomy'       => $taxonomy_name,
		'post_status'    => $post_status,
		'category'       =>  $category,
		'category_name'  => $category_name,
		'orderby'        => $orderby,
		'order'          => $order,
		//'term'=>$termo,
	); $postList = get_posts($postlist_args);
	//2.Get ids of Posts retrieved from `get_posts()`
	$ids = array();
	foreach($postList as $thePost){ $ids[] = $thePost->ID; }
	//3.Get and echo Previous and Next links of Posts
	$thisIndex = array_search($current_postId, $ids);
	if( $thisIndex ){ $prevId = $ids[$thisIndex-1]; }
	if( ($thisIndex+1) < count($ids) ){ $nextId = $ids[$thisIndex+1]; }
	/* Simple show links Posts <-- Prev  Next -->
		if( !empty($prevId) ){ echo '<a class="--prev-post" rel="prev" data-id="'.$prevId.'" href="'.get_permalink($prevId).'"><-- Prev </a>'; }
		if( !empty($nextId) ){ echo '<a class="--next-post" rel="next" data-id="'.$nextId.'" href="'.get_permalink($nextId).'"> Next --></a>'; }
	*/
	if( !empty($prevId) ){
		echo '<div class="case-post" data-id="'.$prevId.'" style="background-image:url('.get_featured_img_by_id($prevId).');">
			<a class="--prev-post" rel="prev" href="'.get_permalink($prevId).'">Prev Case</a>
			<a class="--prev-post-title" href="'.get_permalink($prevId).'">'.get_the_title($prevId).'</a>
		</div>';
	}
	if( !empty($nextId) ){
		echo '<div class="case-post" data-id="'.$nextId.'" style="background-image:url('.get_featured_img_by_id($nextId).');">
			<a class="--next-post" rel="next" href="'.get_permalink($nextId).'">Next Case</a>
			<a class="--prev-post-title" href="'.get_permalink($nextId).'">'.get_the_title($nextId).'</a>
		</div>';
	}
} //Call: navigation_bar_of_cpt(get_the_ID(),'cases','cases-taxonomy','publish',0,'','date','ASC'); | navigation_bar_of_cpt(get_the_ID(),'services','services-taxonomy','publish',0,'','date','ASC');


/** Find value matches in one-dimensional arrays
 * @param $comparison_array (mixed: int|str...) - element or value to be searched in the given array
 * @param $main_array (array) - main array,- the array in which we want to search.
 * @param $mode (bool) - optional param. If TRUE, then searches for the value with the same type of value as $comparison_array param. Default: FALSE.
 * @return array
 */
function find_in_array_onedimensional($comparison_array, $main_array, $mode=false){
	$result = [];
	for( $i=0,$cnt=count($main_array); $i < $cnt; $i++ ){
		if( in_array($main_array[$i], $comparison_array, $mode) ){ array_push($result, $main_array[$i]); }
	}
	return $result;
}

/** Allow uploading DWG files*/
function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['dwg'] = 'image/vnd.dwg';
	$existing_mimes['dwg'] = 'application/acad';
	$existing_mimes['dwg'] = 'application/autocad';
	$existing_mimes['dwg'] = 'application/autocaddwg';
	$existing_mimes['dwg'] = 'application/dwg';
	$existing_mimes['dwg'] = 'drawing/dwg';
	$existing_mimes['dwg'] = 'image/dwg';
	return $existing_mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');
