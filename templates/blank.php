<?php 
/* 
Template Name: Blank Page 
Template Post Type: post, page
*/ 
get_template_part('parts/header');?>

<section id="body" class="ncontent ncontent-full">
	<main class="ncontent_main" itemprop="mainContentOfPage">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post();?>
			<?php // get_template_part('parts/link-pages-header');?>
			<?php the_content()?>
			<?php // get_template_part('parts/link-pages-footer');?>
		<?php endwhile;?>
		<?php else : ?>
		<?php get_template_part('parts/not-found');?>
		<?php endif; ?>
	</main>
</section>

<?php get_template_part('parts/footer');?>