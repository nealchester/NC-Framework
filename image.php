<!DOCTYPE html>
<html <?php nc_schema_org_markup(); ?> <?php language_attributes(); ?> id="pagetop">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post();?>

<?php // The Image
echo wp_get_attachment_image( get_the_ID(), 'large', null, array('class'=> 'attachment_image') ); ?>

<div class="ncontain attachment_content">

	<?php // The Title
	the_title('<h1 class="attachment_title">','</h1>');?>

	<?php // Image Size and Download URL 
	$metadata = wp_get_attachment_metadata();
	$image_size = esc_html( $metadata['width'] ).' &times; '.esc_html( $metadata['height'] );
	$image_url = esc_url(wp_get_attachment_url());
	?>

	<p class="attachment_link">
		<a href="<?php echo $image_url; ?>"><?php _e('View full image', 'nc-framework'); echo '('.$image_size.')'; ?></a>
	</p>

	<?php // The Excerpt
	if(has_excerpt()) :?><div class="attachment_excerpt"><?php the_excerpt();?></div><?php endif; ?>

	<?php // The Description
	if(!empty( get_the_content() )) :?><div class="attachment_desc"><?php the_content();?></div> <?php endif; ?>



	<p class="attachment_back">
		<button class="btn" onclick="nc_goBack()"><?php _e('Back', 'nc-framework'); ?></button>
	</p>
	<script>function nc_goBack() { window.history.back();}</script>

</div>


<?php /* <p><a class="btn" href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" 
	title="<?php echo get_the_title( $post->post_parent ); ?>" rel="gallery">&laquo; Back to article</a></p>

	<?php /*
	<nav class="attachment_nav">
		<div class="attachment_prev">
			<?php previous_image_link('thumbnail'); ?>
		</div>
		<div class="attachment_next">
			<?php next_image_link('thumbnail'); ?>
		</div>
	</nav>
*/?>


<?php endwhile; ?> 
<?php else: ?>
<?php get_template_part('parts/not-found');?>
<?php endif; ?>
<?php get_template_part('parts/footer');?>