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
$copyright_text = get_field('copyright_text','options');
$social_links = get_field('social_links','options');
$contactInfo = get_field('сontact_Info_group','options');
//__/General(Options)" Settings

//"About Us" Section
$suptitle_aboutUs = get_field('suptitle_aboutUs', get_the_ID() );
$title_aboutUs = get_field('title_aboutUs', get_the_ID() );
$text_description_1_aboutUs = get_field('text_description_1_aboutUs', get_the_ID() );
$text_description_2_aboutUs = get_field('text_description_2_aboutUs', get_the_ID() );
$optBtnLink_aboutUs = get_field('optional_button_link_aboutUs', get_the_ID() );
//__/"About Us" Section

//"Our Work(Projects)" Section
//__/"Our Work(Projects)" Section

//"Our Services" Section
//__/"Our Services" Section

//"Testimonials" Section
$optBtnLink_testimonials = get_field('optional_button_link_testimonials', get_the_ID() );
//__/"Testimonials" Section

//"Our Tools(Technologies)" Section
$suptitle_ourtools = get_field('suptitle_ourtools', get_the_ID() );
$title_ourtools = get_field('title_ourtools', get_the_ID() );
//__/"Our Tools(Technologies)" Section

//"Contact Us" Section
$suptitle_contactus = get_field('suptitle_contactus', get_the_ID() );
$title_contactus = get_field('title_contactus', get_the_ID() );
$bg_contactus_section = get_field('bg_contactus_section', get_the_ID() );
if( $bg_contactus_section ){ $bg_contactusUrl = $bg_contactus_section;}else{ $bg_contactusUrl = get_stylesheet_directory_uri().'/img/contact-bg.jpg" alt="Contact Us background Dotebo'; }
//__/"Contact Us" Section
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
		</div><!--/row-->
		<div class="row--3 mt-lg-5 mt-3 row justify-content-center">
			<?php get_template_part('templates/component/__services2_for_aboutus_section');?>
		</div>
	</div>
</section>

<section id="project_services" class="project-services">
	<div class="veil">
		<!--"Our Work(Projects)" Section-->
		<section id="projects" class="section-regular projectss">
			<p class="suptitle text-uppercase text-center mb-3">projects</p>
			<div class="text-center">
				<h2 class="title text-capitalize mb-2">our work</h2>
			</div>

			<div class="container-md">
				<?php get_template_part('templates/component/__projects_cpt_for_project_section');?>
			</div>
		</section>
		<!--/"Our Work(Projects)" Section-->
		<!--"Our Services" Section-->
		<section id="services" class="section-regular services">
			<p class="suptitle text-uppercase text-center mb-3">what we do</p>
			<div class="text-center">
				<h2 class="title text-capitalize mb-2">our Services</h2>

				<div class="container-md">
					<?php get_template_part('templates/component/__services_cpt_for_services_section');?>
				</div>
			</div>
		</section>
		<!--"/Our Services" Section-->
	</div> <!--.veil-->
</section>

<section id="testimonials" class="section-regular testimonials">
	<!--Testimonials Slider-->
	<?php get_template_part('templates/component/__testimonials');?>
	<!--/Testimonials Slider-->
	<div class="container-md px-lg-5 mt-2 text-lg-start text-center">
		<?php if($optBtnLink_testimonials): $link_target = ($optBtnLink_testimonials['target']) ? $optBtnLink_testimonials['target'] : '_self';?>
			<a class="cst-link-arrow px-lg-5" href="<?php echo $optBtnLink_testimonials['url'];?>" target="<?php echo esc_attr($link_target);?>"><?php echo $optBtnLink_testimonials['title'];?></a>
		<?php endif;?>
	</div>

	<div class="our-tools">
		<div class="container-lg pt-md-0 pt-0 pb-md-0 pb-0">
			<?php get_template_part('templates/component/__our_offers_plans');?>
		</div><!--/container-lg-->
	</div>
</section>

<section id="technologies" class="section-regular technologies">
	<div class="container-lg pt-md-0 pt-0 pb-md-0 pb-0">
		<div class="row align-items-center">
			<p class="suptitle text-uppercase mb-3 text-center"><?php echo($suptitle_ourtools) ? $suptitle_ourtools : 'our tools';?></p>
			<div class="text-center">
				<h2 class="title text-capitalize mb-2"><?php echo($title_ourtools) ? $title_ourtools : 'technologies we work with';?></h2>
			</div>
			
			<div class="container-lg mt-md-4 mt-3 technologies-block">
				<!--desktop version-->
				<?php get_template_part('templates/component/__our_technologies_desktop');?>
				<!--/desktop version-->

				<!--mobile version-->
				<?php get_template_part('templates/component/__our_technologies_mobile');?>
				<!--/mobile version-->
			</div>
		</div><!--/row-->
	</div>
</section>

<section id="contact" class="section-regular contact" style="background-image: url(<?php echo $bg_contactusUrl;?>);">
	<div class="container-lg pt-md-0 pt-0 pb-md-0 pb-0">
		<p class="suptitle text-uppercase mb-3"><?php echo($suptitle_contactus) ? $suptitle_contactus : 'contact us';?></p>
		<div class="mb-4">
			<h2 class="title text-capitalize mb-2"><?php echo($title_contactus) ? $title_contactus : 'let is talk';?></h2>
		</div>
	</div><!--/container-lg-->

	<div class="container-lg pt-md-0 pt-0 pb-md-0 pb-0">
		<div class="row">
			<div class="col-lg-8 col-md-7 --contact-cf">
				<?php echo do_shortcode('[contact-form-7 id="255" title="Contact form 1"]');?>
			</div>
			<div class="col-lg-4 col-md-5 ps-md-5 mb-lg-0 mb-5 --contact-info">
				<div class="row">
					<div class="col-md-12 col-6 mt-md-0 mt-5">
						<?php if( $contactInfo && $contactInfo['сontact_Info_tell'] ):?>
						<span class="ps-lg-5 d-block fw-bolder mb-2">Phone</span>
						<span class="ps-lg-5 d-block mb-md-5 mb-4">
							<a class="text-decoration-none" href="tel:<?php echo $contactInfo['сontact_Info_tell'];?>"><?php echo $contactInfo['сontact_Info_tell'];?></a>
						</span>
						<?php endif;?>

						<?php if( $contactInfo && $contactInfo['сontact_Info_mail'] ):?>
							<span class="ps-lg-5 d-block fw-bolder mb-2">Email</span>
							<span class="ps-lg-5 d-block">
								<a class="text-decoration-none" href="mailto:<?php echo $contactInfo['сontact_Info_mail'];?>"><?php echo $contactInfo['сontact_Info_mail'];?></a>
							</span>
						<?php endif;?>
					</div>
					<div class="col-md-12 col-6 mt-md-5 mt-5">
						<span class="ps-lg-5 d-block fw-bolder mb-2">Social media</span>
						<?php if( $social_links && is_array($social_links) ):?>
							<?php foreach( $social_links as $s_link ){ ?>
								<span class="ps-lg-5 d-block mb-2">
									<a class="text-decoration-none text-capitalize" href="<?php echo $s_link['social_link_url'];?>" target="_blank"><?php echo getDomainNameFrom_URL($s_link['social_link_url'])?></a>
								</span>
							<?php };?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div><!--/container-lg-->
	<!-- ReCaptcha instruction:  https://contactform7.com/recaptcha/ -->
	<!-- https://www.google.com/recaptcha/admin/site/695949234/setup
	SITE KEY: 6LeyV3spAAAAANWey7mGtEHllLRBGROvVzye6k75
	SECRET KEY: 6LeyV3spAAAAABiMORuJDURE6ayLK898ufmshARX
	 -->
</section>

<div id="site-info-bottom">
	<div class="container-lg">
		<div class="row">
			<div class="col-md-12">
				<p>Copyright <?php echo date("Y") . ' ' . get_bloginfo('name');?></p>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .site-info -->

<?php get_footer(); ?>
