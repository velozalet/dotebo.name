<?php
$our_tools_gallery = get_field('our_tools_technologies', get_the_ID() ); $our_tools_gallery_count = count($our_tools_gallery);
?>
<!--desktop version-->
<div class="row justify-content-center align-items-center d-md-flex d-none">
	<?php for( $i=0; $i < $our_tools_gallery_count; $i++ ):?>
		<div class="col-lg-2 col-md-3 mb-md-3">
			<div class="technologies--item text-center">
				<img src="<?php echo $our_tools_gallery[$i];?>" alt="Our Tool, Technologies">
			</div>
		</div>
	<?php endfor;?>
</div><!--/row-->
<!--/desktop version-->
