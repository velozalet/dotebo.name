<?php
$our_tools_gallery = get_field('our_tools_technologies', get_the_ID() ); $our_tools_gallery_count = count($our_tools_gallery);
?>
<!--mobile version-->
<div class="row justify-content-center align-items-center d-md-none d-flex">
	<div id="__technologies_slider" class="splide __technologies-slider" aria-label="Technologies Slider">
		<div class="splide__track">
			<ul class="splide__list">
				<?php for( $i=0; $i < $our_tools_gallery_count; $i++ ):?>
					<li class="splide__slide">
						<div class="col mx-2">
							<div class="technologies--item text-center">
								<img src="<?php echo $our_tools_gallery[$i];?>" alt="Our Tool, Technologies">
							</div>
						</div>
					</li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
</div><!--/row-->
<!--/mobile version-->