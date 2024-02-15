<?php
$projects_cpt_collection = get_field('projects_cpt_relationship', get_the_ID() );
?>

<div class="--our-projects row mt-lg-5 mt-3 justify-content-center">
	<?php if( $projects_cpt_collection && is_array($projects_cpt_collection) ):?>
		<?php $i_project_cnt = 0; foreach($projects_cpt_collection as $i_project):?>
			<div id="project_cpt_<?php echo $i_project->ID;?>" class="col-sm-6 col-12 mb-md-5 mb-4 px-sm-3" data-id="<?php echo $i_project->ID;?>">
				<div class="img-project text-md-start text-center">
					<img class="img-fluid" src="<?php echo get_featured_img_by_id($i_project->ID);?>" alt="Dotebo Project <?php echo $i_project->post_title;?>">
				</div>
				<p class="mt-3 mb-1"><?php echo $i_project->post_title;?></p>
				<div class="tags-project mt-3 mb-0">
					<?php $project_cats = get_categories_of_cpt_by_id($i_project->ID, 'projects-taxonomy'); ?>
					<?php if( $project_cats && is_array($project_cats) ):?>
						<?php foreach( $project_cats as $project_cat ){ ?>
							<span class="me-lg-2 me-2 mb-lg-0 mb-md-2 mb-2"><?php echo $project_cat->name;?></span>
						<?php } ?>
					<?php endif;?>
				</div>
			</div>
			<?php $i_project_cnt++; endforeach;?>
	<?php endif;?>
</div><!--/row-->

