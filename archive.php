<?php 
	get_template_part('parts/layout_begin');
 	get_template_part('parts/the-title'); 
 	if (have_posts()) : ?>

	<div class="listings">
	<?php while (have_posts()) : the_post(); ?>

		<?php // The card 
		get_template_part('parts/card');?>

	<?php endwhile;?>
	<?php get_template_part('parts/paginate');?>
	<?php if(is_search()) { get_template_part('parts/search_form'); echo'<div style="height:3rem"></div>';} ?>
	</div>

<?php else : ?>
	<?php if(is_search()):?>
	<p>Sorry, nothing was found. Do another search below.</p>
	<?php get_template_part('parts/search_form'); ?><div style="height:3rem"></div>
	<?php else:?>
	<?php get_template_part('parts/not-found');?>
	<?php endif; ?>
<?php endif; ?>

<?php get_template_part('parts/layout_end');?>