<?php
/**
 * FOOTER
 *
 * @package maxcanvas
 */
?>

<footer class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
				<div id="footer1" class="widget-area col-sm-6 col-md-3" role="complementary">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div><!-- Footer Widget 1 -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
				<div id="footer2" class="widget-area col-sm-6 col-md-3" role="complementary">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div><!-- Footer Widget 2 -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
				<div id="footer3" class="widget-area col-sm-6 col-md-3" role="complementary">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div><!-- Footer Widget 3 -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer4' ) ) : ?>
				<div id="footer4" class="widget-area col-sm-6 col-md-3" role="complementary">
					<?php dynamic_sidebar( 'footer4' ); ?>
				</div><!-- Footer Widget 4 -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->

	<div id="site-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>&copy; <?php echo date("Y") . ' ' . get_bloginfo('name') ?> All Rights Reserved | Designed and Maintained by <a href="http://dotebo.com/" target="_blank">DOTEBO++</a></p>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .site-info -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>
