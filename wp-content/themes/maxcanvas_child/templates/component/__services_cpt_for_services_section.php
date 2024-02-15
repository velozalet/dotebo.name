<?php
$services_cpt_collection = get_field('services_cpt_relationship', get_the_ID() );
?>

<div class="--our-services row mt-lg-5 mt-3 justify-content-center">
	<?php if( $services_cpt_collection && is_array($services_cpt_collection) ):?>
		<?php $i_service_cnt = 0; foreach($services_cpt_collection as $i_service):?>

			<div id="service_cpt_<?php echo $i_service->ID;?>" class="col-lg-4 col-sm-6 col-12 mb-md-5 mb-4" data-id="<?php echo $i_service->ID;?>">
				<div class="img-project text-center">
					<div class="veil-service-block">
						<img class="img-fluid" src="<?php echo get_featured_img_by_id($i_service->ID);?>" alt="Dotebo Service <?php echo $i_service->post_title;?>">
					</div>
				</div>
				<p class="--our-services-name-service text-start mt-4 mb-0"><?php echo $i_service->post_title;?></p>
				<p class="--our-services-description text-start mt-md-3 mt-2 mb-md-4 mb-2"><?php echo $i_service->post_content;?></p>

				<?php if( get_field('show_hide_obl_services_cpt', $i_service->ID ) ):?>
					<?php $optBtnLink_services_cpt = get_field('optional_button_link_services_cpt', $i_service->ID );?>
					<?php if($optBtnLink_services_cpt): $link_target = ($optBtnLink_services_cpt['target']) ? $optBtnLink_services_cpt['target'] : '_self';?>
						<a class="cst-link-arrow d-block text-start" href="<?php echo $optBtnLink_services_cpt['url'];?>" target="<?php echo esc_attr($link_target);?>"><?php echo $optBtnLink_services_cpt['title'];?></a>
					<?php endif;?>
				<?php endif;?>
			</div>
			<?php $i_service_cnt++; endforeach;?>
	<?php endif;?>
</div><!--/row-->
