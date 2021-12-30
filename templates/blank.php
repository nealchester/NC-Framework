<?php 
/* 
Template Name: Blank Page 
Template Post Type: post, page
*/ 
get_template_part('parts/header');?>

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post();?>
	<?php the_content()?>
	<?php endwhile;?>
	<?php else : ?>
	<?php get_template_part('parts/not-found');?>
	<?php endif; ?>

<?php get_template_part('parts/footer');?>