<?php 
/* 
Template Name: Coming Soon
Template Post Type: page
*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> id="pagetop">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="comingsoon">
      <div class="comingsoon_side1">
        <div class="comingsoon_content">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <?php the_content()?>
          <?php endwhile;?>
          <?php else : ?>
          <?php get_template_part('parts/not-found');?>
          <?php endif; ?>
        </div>
      </div>
      <div class="comingsoon_side2">
        <div class="comingsoon_newsletter">
            <?php echo do_shortcode('[mc4wp_form id="12"]');?>
        </div>
      </div>
  </div>  

<?php // WP Footer
wp_footer(); ?>

</body>
</html>