<?php
$serv_block_repeater_aboutUs = get_field('services_block_aboutUs', get_the_ID() );
?>

<div class="row justify-content-center">
	<?php if( $serv_block_repeater_aboutUs && is_array($serv_block_repeater_aboutUs) ):?>
		<?php foreach( $serv_block_repeater_aboutUs as $service_i ){ ?>
			<div class="col-lg-12 col-6 text-lg-start text-center mb-4">
				<div class="row align-items-center">
					<div class="icon-container col-lg-auto">
						<img src="<?php echo $service_i['Icon__services_block2_aboutUs'];?>" alt="Dotebo Logo">
					</div>
					<div class="text-container col">
						<p class="mt-lg-0 mt-2 mb-1"><?php echo $service_i['title__services_block_aboutus'];?></p>
						<p class="mb-0"><?php echo $service_i['text__services_block_aboutus'];?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php endif;?>
</div> <!--/row-->