<?php 
/* 
Template Name: Content w/ Sidebar
Template Post Type: post, page
*/ 
get_template_part('parts/header');?>

<section id="body" class="ncontent ncontent-left ncontent-full">
	<div class="ncontain">
		<main class="ncontent_main" itemprop="mainContentOfPage">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post();?>
				<?php get_template_part('parts/the-title');?>
				<?php get_template_part('parts/link-pages-header');?>
				<?php the_content()?>
				<?php get_template_part('parts/link-pages-footer');?>
			<?php endwhile;?>
			<?php else : ?>
			<?php get_template_part('parts/not-found');?>
			<?php endif; ?>
		</main>
		<aside class="ncontent_sidebar">
			<?php get_template_part('parts/sidebar'); ?>
		</aside>
	</div>
</section>

<?php get_template_part('parts/footer');?>