<?php
$testimonials_slider = get_field('testimonials_slider', get_the_ID() );
?>
<!--Testimonials Slider-->
<div id="__testimonials_slider" class="splide __testimonials-slider" aria-label="Testimonials Slider">
	<div class="splide__track">
		<ul class="splide__list">
			<?php if( $testimonials_slider && is_array($testimonials_slider) ):?>
				<?php foreach( $testimonials_slider as $t_i ): ?>
					<li class="splide__slide">
						<div class="container-md">
							<div class="row d-flex align-items-center px-lg-5">
								<div class="col-md col-12 px-lg-5 text-start">
									<!--Star's rating-->
									<figure class="mb-lg-4 mb-2">
										<?php $stars_review_collect = $t_i['number_of_stars_for_this_review'];?>
										<?php $stars_review = ( $stars_review_collect ) ? $stars_review_collect : 5;?>
										<?php for( $t_i_cnt=0; $t_i_cnt < $stars_review_collect; $t_i_cnt++ ):?>
											<img class="me-1" src="<?php echo get_stylesheet_directory_uri();?>/img/pointed-star.svg" alt="testimonials star">
										<?php endfor;?>
									</figure>
									<!--/Star's rating-->
									<p class="testimonials-review"><?php echo $t_i['testimonial_this_text'];?></p>
									<p class="mt-3 text-lg-start text-center"><?php echo $t_i['testimonials_sub_title'];?></p>
								</div>
							</div><!--/row-->
						</div>
					</li>
				<?php endforeach; ?>
			<?php endif;?>
		</ul>
	</div>
</div>
<!--/Testimonials Slider-->
