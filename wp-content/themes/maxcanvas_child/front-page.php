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

//"Our Work(Projects)" Section
//__/"Our Work(Projects)" Section

//"Our Services" Section
//__/"Our Services" Section

//"Testimonials" Section
$optBtnLink_testimonials = get_field('optional_button_link_testimonials', get_the_ID() );

$our_offers = get_field('our_business_offers', get_the_ID() )['our_business_offers_repeater']; //dd($our_offers);
//__/"Testimonials" Section

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
			<?php //get_template_part('templates/component/__our_offers_plans');?>
			<div class="row align-items-center justify-content-center">
				<?php if( $our_offers && is_array($our_offers) ):?>
					<?php foreach( $our_offers as $offer_i ): ?>
					<div class="col-xl-4 col-lg-6 col-12 mb-md-5 mb-4">
						<div class="item-offer-block">
							<?php if($offer_i['offer_title']):?> <h3><?php echo $offer_i['offer_title'];?></h3> <?php else:?> <h3 class="invisible">;nbsp</h3> <?php endif;?>
							<?php if($offer_i['offer_text']):?> <p><?php echo $offer_i['offer_text'];?></p> <?php else:?> <p class="invisible">;nbsp</p> <?php endif;?>
							<ul class="ps-0">
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer"><?php if($offer_i['_delivery_time_name_field']): echo $offer_i['_delivery_time_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value"><?php if($offer_i['_delivery_time']): echo $offer_i['_delivery_time']; endif;?></div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer"><?php if($offer_i['_number_revisions_name_field']): echo $offer_i['_number_revisions_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value"><?php if($offer_i['_number_revisions']): echo $offer_i['_number_revisions']; endif;?></div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer"><?php if($offer_i['_number_pages_name_field']): echo $offer_i['_number_pages_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value"><?php if($offer_i['_number_pages']): echo $offer_i['_number_pages']; endif;?></div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer"><?php if($offer_i['_number_products_name_field']): echo $offer_i['_number_products_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value"><?php if($offer_i['_number_products']): echo $offer_i['_number_products']; endif;?></div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer"><?php if($offer_i['_number_plugins_name_field']): echo $offer_i['_number_plugins_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value"><?php if($offer_i['_number_plugins']): echo $offer_i['_number_plugins']; endif;?></div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer --item-offer-check"><?php if($offer_i['_design_customization_name_field']): echo $offer_i['_design_customization_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value">
											<?php if($offer_i['_design_customization']):?><img src="<?php echo get_stylesheet_directory_uri();?>/img/offer-item-ok.svg" alt="Dotebo"><?php endif;?>
										</div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer --item-offer-check"><?php if($offer_i['_responsive_design_name_field']): echo $offer_i['_responsive_design_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value">
											<?php if($offer_i['_responsive_design']):?><img src="<?php echo get_stylesheet_directory_uri();?>/img/offer-item-ok.svg" alt="Dotebo"><?php endif;?>
										</div>
									</div>
								</li>
								<li class="mb-2">
									<div class="row justify-content-center align-items-center">
										<div class="col-9 text-start --item-offer --item-offer-check"><?php if($offer_i['_payment_gateway_setup_name_field']): echo $offer_i['_payment_gateway_setup_name_field']; endif;?></div>
										<div class="col-3 text-start --item-offer-value">
											<?php if($offer_i['_payment_gateway_setup']):?><img src="<?php echo get_stylesheet_directory_uri();?>/img/offer-item-ok.svg" alt="Dotebo"><?php endif;?>
										</div>
									</div>
								</li>
							</ul>
							<div class="mt-3 --item-offer-price">$<?php if($offer_i['_offer_price']): echo $offer_i['_offer_price']; endif;?></div>
						</div>
						<div class="item-offer-block-choose-plan mt-2 text-center">
							<?php if( $offer_i['optional_button_link_the_offer'] ): $link_target = ($offer_i['optional_button_link_the_offer']['target']) ? $offer_i['optional_button_link_the_offer']['target'] : '_self';?>
								<a class="cst-link-arrow px-lg-5" href="<?php echo $offer_i['optional_button_link_the_offer']['url'];?>" target="<?php echo esc_attr($link_target);?>"><?php echo $offer_i['optional_button_link_the_offer']['title'];?></a>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach; ?>
				<?php endif;?>
			</div><!--/row-->
		</div><!--/container-lg-->
	</div>

</section>





<section id="technologies" class="section-regular section-regular-test technologies">
	<div class="container-md pt-md-0 pt-0 pb-md-0 pb-0">
		<div class="row align-items-center">
			<h2 class="text-center">Our tools </h2>
			<h2 class="text-center">Technologies </h2>
		</div><!--/row-->
	</div>
</section>

<section id="contact" class="section-regular section-regular-test contact">
	<h2 class="text-center"> contact Us </h2>
</section>

<?php get_footer(); ?>
