<?php get_template_part('parts/header');?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();?>

<?php // The title
get_template_part('parts/the-title');?>

<?php // Page Info
get_template_part('parts/meta-avatar');?>

<?php // Featured image
get_template_part('parts/featured-image'); ?>

<?php // The Content
the_content(); ?>

<?php // Comments
comments_template() ?>

<?php endwhile;?>
<?php else : ?>
<?php get_template_part('parts/not-found');?>
<?php endif; ?>

<?php get_template_part('parts/footer');?>