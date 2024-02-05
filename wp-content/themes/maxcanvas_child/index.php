<?php
/**
 * INDEX
 *
 * @package maxcanvas
 */

get_header(); ?>

<?php get_template_part( 'templates/component/subheader' ); ?>

<main id="main" class="site-main" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'templates/content/post' ); ?>
						<?php endwhile; ?> ввввввввввввввв+++

						<?php get_template_part( 'templates/component/pagination' ); ?>

				<?php else : ?>
					<?php get_template_part( 'templates/content/none' ); ?>
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>

		</div><!-- row -->
	</div><!-- container -->
</main><!-- #main -->

<?php get_template_part( 'templates/component/bottom' ); ?>

<?php get_footer(); ?>
