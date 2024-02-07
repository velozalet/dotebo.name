<?php
$social_links = get_field('social_links','options');
?>

<?php if( $social_links && is_array($social_links) ):?>
	<?php foreach( $social_links as $s_link ){ ?>
		<a class="text-decoration-none me-md-3 me-3" href="<?php echo $s_link['social_link_url'];?>" target="_blank">
			<img src="<?php echo $s_link['social_link_icon'];?>" alt="Social Media Dotebo">
		</a>
	<?php } ?>
<?php endif;?>