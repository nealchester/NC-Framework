<?php 
/* 
Template Name: Content w/ Sidebar
Template Post Type: post, page
*/ 
get_template_part('parts/header');?>

<div class="ncontain alignmax ncontent-left">

	<div class="ncontent_content">
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
	</div>
	<aside class="ncontent_sidebar">
		<?php get_template_part('parts/sidebar'); ?>
	</aside>

</div>

<style>

.ncontent-left,
.ncontent-right {
	display:flex;
	justify-content: space-between;
	gap: clamp(2em, 6vw, 6em);
}

.ncontent-right {
	flex-direction: row-reverse;
}

.ncontent_content {
	flex-grow:1;
}

.ncontent_content > * {
	max-width: var(--width-standard)
}

.ncontent_sidebar {
	padding:3rem 0;
	width: 350px;
}

/* Responsive */

@media(max-width:960px){

	.ncontent-left,
	.ncontent-right {
		flex-direction:column;
		gap: 3em;
	}

	.ncontent_sidebar {
		padding:0 0 3rem 0;
		width: auto;
	}

}

</style>

<?php get_template_part('parts/footer');?>