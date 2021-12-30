<?php get_template_part('parts/header');?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();?>

<?php // The title 
get_template_part('parts/the-title');?>

<?php // Featured image
// get_template_part('parts/featured-image'); ?>

<?php // Pagination Links header
// get_template_part('parts/link-pages-header');?>

<?php // The Content
the_content(); ?>

<?php // Pagination Links footer 
// get_template_part('parts/link-pages-footer');?>

<?php // Related Pages
// get_template_part('parts/related-pages');?>

<?php // Comments
// comments_template(); ?>

<?php endwhile;?>
<?php else : ?>
<?php get_template_part('parts/not-found');?>
<?php endif; ?>

<?php get_template_part('parts/footer');?>