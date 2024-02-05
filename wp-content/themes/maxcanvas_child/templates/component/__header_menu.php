<?php
$menuitems = get_all_menu('primary','ASC'); $menuitems_count = count($menuitems); $currentUrl = $_SERVER['REQUEST_URI'];
?>
<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-end">
	<?php foreach( $menuitems as $menu_item ){ ?>
		<li class="nav-item">
			<a class="nav-link active" aria-current="page" href="<?php echo $menu_item->url;?>"><?php echo $menu_item->post_title;?></a>
		</li>
	<?php } ?>
	<li class="nav-item nav-item-decor d-md-block d-none">
		<a class="nav-link" href="#">
			<img src="<?php echo get_stylesheet_directory_uri();?>/img/half-hamb.svg" alt="Dotebo design">
		</a>
	</li>
</ul>
