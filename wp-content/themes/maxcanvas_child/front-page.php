<?php
/**
 * Template Name: Home
 *
 * @package maxcanvas
 */
?>
<?php get_header(); ?>

<?php
//"General(Options)" Settings
$copyright_text = get_field('copyright_text','options'); //dd($copyright_text);
$social_links = get_field('social_links','options');
//__/General(Options)" Settings

//"About Us" Section
$suptitle_aboutUs = get_field('suptitle_aboutUs', get_the_ID() );
$title_aboutUs = get_field('title_aboutUs', get_the_ID() );
$text_description_1_aboutUs = get_field('text_description_1_aboutUs', get_the_ID() );
$text_description_2_aboutUs = get_field('text_description_2_aboutUs', get_the_ID() );

$optBtnLink_aboutUs = get_field('optional_button_link_aboutUs', get_the_ID() );
//__/"About Us" Section
?>

<section id="about" class="section-regular about">
	<div class="container-md pt-md-0 pt-0 pb-md-0 pb-0">
		<div class="row align-items-center">
			<div class="row--1 col-lg-7 col-12">
				<p class="suptitle text-uppercase mb-3"><?php echo($suptitle_aboutUs) ? $suptitle_aboutUs : 'welcome to';?></p>
				<h1 class="title text-capitalize mb-2"><?php echo($title_aboutUs) ? $title_aboutUs : 'digital agency dotebo';?></h1>
				<?php if($text_description_1_aboutUs):?>
					<p class="text-describe-bold mb-2"><?php echo $text_description_1_aboutUs;?></p>
				<?php endif;?>
				<?php if($text_description_2_aboutUs):?>
					<p class="text-describe mb-2"><?php echo $text_description_2_aboutUs;?></p>
				<?php endif;?>

				<div class="social-icons-bar mt-4">
					<?php get_template_part('templates/component/__social_links_for_aboutus_section');?>
				</div>

				<div class="mt-md-5 mt-4">
					<?php if($optBtnLink_aboutUs): $link_target = ($optBtnLink_aboutUs['target']) ? $optBtnLink_aboutUs['target'] : '_self';?>
						<a class="cst-link-arrow" href="<?php echo $optBtnLink_aboutUs['url'];?>" target="<?php echo esc_attr($link_target);?>"><?php echo $optBtnLink_aboutUs['title'];?></a>
					<?php endif;?>
				</div>
			</div>
			<div class="row--2 col-lg col-12 mt-lg-0 mt-5">
				<?php get_template_part('templates/component/__services_for_aboutus_section');?>
			</div>
		</div>  <!--/row-->
		<div class="row--3 mt-lg-5 mt-3 row justify-content-center">
			<?php get_template_part('templates/component/__services2_for_aboutus_section');?>
		</div>
	</div>
</section>

<section id="projects" class="section-regular section-regular-test projects">
<h2 class="text-center">Projects</h2>
</section>

<section id="services" class="section-regular section-regular-test services">
	<h2 class="text-center">Services </h2>
</section>

<section id="technologies" class="section-regular section-regular-test technologies">
	<h2 class="text-center">Technologies </h2>
</section>

<section id="tools" class="section-regular section-regular-test tools">
	<h2 class="text-center">Our tools </h2>
</section>

<section id="contact" class="section-regular section-regular-test contact">
	<h2 class="text-center"> contact Us </h2>
</section>

<?php get_footer(); ?>
