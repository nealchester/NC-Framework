<?php get_template_part('parts/layout_begin');?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();?>

<?php // The title
get_template_part('parts/the-title');?>

<?php // Page Info
if(get_theme_mod('main_title_format', 'plain-text') == 'plain-text'):?>
<?php get_template_part('parts/meta-avatar');?>
<?php endif;?>

<?php // Featured image
get_template_part('parts/featured-image'); ?>

<?php // Excerpt-Summary
get_template_part('parts/meta-excerpt'); ?>

<?php // Pagination Links header
get_template_part('parts/link-pages-header');?>

<?php // The Content
the_content(); ?>

<?php // Pagination Links footer 
get_template_part('parts/link-pages-footer');?>

<?php // Published & Modified Date
// get_template_part('parts/meta-date'); ?>

<?php // Categories
get_template_part('/parts/meta-categories');?>

<?php // Tags
get_template_part('/parts/meta-tags');?>

<?php // Author box
get_template_part('/parts/meta-box');?>

<?php // Related Posts Plugin
if( function_exists('nc_related_posts') ) { nc_related_posts(); };?>


<?php // Comments
get_template_part('parts/comments')?>

<?php endwhile;?>
<?php else : ?>
<?php get_template_part('parts/not-found');?>
<?php endif; ?>
<?php get_template_part('parts/layout_end');?>