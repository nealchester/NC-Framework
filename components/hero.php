<section id="banner" class="nchero">
	<?php if( is_singular() && has_post_thumbnail() && get_theme_mod('banner_featured', true) == true ):?>
	<?php the_post_thumbnail( 'large', array( "class" => "nchero_image", "style" => nc_featured_image_focus() ) ); ?>
	<?php elseif( is_archive() || is_home() || is_404() || is_search() || is_singular()):?>
			<?php if(get_header_image_tag()):?> <?php echo get_header_image_tag( array( "class" => "nchero_image" ) );?>
			<?php else:?><img class="nchero_image" src="<?php echo get_theme_file_uri('/img/default-banner.jpg');?>" />
			<?php endif; ?>
	<?php endif;?>
		<div class="ncontain">
			<div class="nchero_content">
				<?php get_template_part('parts/headings');?>
			</div>
		</div>
</section>