<?php get_template_part('parts/header');?>

<?php get_template_part('parts/the-title'); ?>

<?php if (have_posts()) : ?>

<div class="lcard_box">
	<?php while (have_posts()) : the_post(); ?>

		<?php // The card 
		get_template_part('parts/card');?>

	<?php endwhile;?>
</div>
<?php get_template_part('parts/paginate');?>

<?php if(is_search()) {
	get_template_part('parts/searchform');
} ?>

<?php else : ?>
	<?php if(is_search()):?>
		<?php get_template_part('parts/not-found');?>
	<?php else:?>
		<?php get_template_part('parts/not-found');?>
	<?php endif; ?>
<?php endif; ?>

<?php get_template_part('parts/footer');?>