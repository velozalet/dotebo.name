<?php
$our_offers = get_field('our_business_offers', get_the_ID() )['our_business_offers_repeater'];

$bg_for_offer_img = get_field('background_for_offer', get_the_ID() );
$bg_for_offer = '';
if( $bg_for_offer_img ){ $bg_for_offer = $bg_for_offer_img;}else{ $bg_for_offer = get_stylesheet_directory_uri().'/img/offer-plan-bg.png'; }
?>

<div class="row align-items-center justify-content-center">
	<?php if( $our_offers && is_array($our_offers) ):?>
		<?php foreach( $our_offers as $offer_i ): ?>
			<div class="col-xl-4 col-lg-6 col-12 mb-md-5 mb-4">
				<div class="item-offer-block" style="background-image: url(<?php echo $bg_for_offer;?>);">
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
