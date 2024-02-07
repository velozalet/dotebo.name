<?php
$serv_block2_repeater_aboutUs = get_field('services_block2_aboutUs', get_the_ID() );
?>

<?php if( $serv_block2_repeater_aboutUs && is_array($serv_block2_repeater_aboutUs) ):?>
	<?php foreach( $serv_block2_repeater_aboutUs as $service_i ){ ?>
		<div class="col-lg-3 col-12"><!--col-6-->
			<p class="mb-0"><?php echo $service_i['Icon__services_block2_aboutUs'];?></p>
			<p class="mt-lg-0 mt-0 mb-1"><?php echo $service_i['title__services_block2_aboutus'];?></p>
			<p class="mb-0"><?php echo $service_i['text__services_block2_aboutus'];?></p>
		</div>
	<?php } ?>
<?php endif;?>