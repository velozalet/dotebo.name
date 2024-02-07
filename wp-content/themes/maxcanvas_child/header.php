<?php
/**
 * HEADER
 *
 * @package maxcanvas
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<!--For fonts googleapis-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!--/For fonts googleapis-->

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php if (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 8")) { header("X-UA-Compatible: IE=Edge");} ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$get_queried_object = get_queried_object(); if(!$get_queried_object){ $get_queried_object = (object) array('post_name' => 'undefined'); }

$logo = get_field('site_logo','options'); $logo2 = get_field('site_logo2','options');
$banner_suptitle = get_field('suptitle','options'); $banner_title = get_field('title','options');
?>
	<mark id="breakpoint_check" style="display:none!important;"></mark>

	<!--banner-->
	<section id="banner" class="section-regular banner">

		<nav id="header_navbar" class="navbar-dark-cst navbar navbar-expand-md navbar-dark fixed-top pt-2 pb-2">
			<div class="container-md">
				<a class="navbar-brand" href="#banner">
					<?php if($logo):?>
						<img src="<?php echo $logo;?>" alt="Dotebo Logo">
					<?php else:?>
						<img src="<?php echo get_site_url();?>/wp-content/uploads/2024/02/logo-svg.svg" alt="Dotebo Logo">
					<?php endif;?>
				</a>
				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php get_template_part('templates/component/__header_menu');?>
				</div>
			</div>
		</nav>

		<figure class="text-center">
			<img class="img-fluid" src="<?php echo get_site_url();?>/wp-content/uploads/2024/02/Layer_1.svg" alt="Dotebo ++">
		</figure>

		<div class="banner--text-info container-md pt-md-0 pt-4 pb-md-0 pb-3">
			<div class="row align-items-center">
				<div class="col">
					<p class="suptitle text-uppercase mb-0"><?php if($banner_suptitle): echo $banner_suptitle; else: echo 'digital agency'; endif;?></p>
					<p class="text-capitalize mb-0"><?php if($banner_title): echo $banner_title; else: echo 'dotebo'; endif;?></p>
				</div>
				<div class="col text-end">
					<a class="" href="#contact">
						<img class="img-fluid" src="<?php echo get_stylesheet_directory_uri();?>/img/banner-arrow-down.svg" alt="Dotebo ++">
					</a>
				</div>
			</div>
		</div>

	</section>
	<!--end banner-->

	<!--header--><!--end header-->

