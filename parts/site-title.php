<div class="nclogo"> 
	<a href="<?php echo home_url();?>" rel="home" class="nclogo_anchor">

		<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>

		<?php if ( has_custom_logo() ) :?>
		<img src="<?php echo esc_url( $logo[0] );?>" class="nclogo_image" alt="<?php echo get_bloginfo('name');?>" />

		<?php else: ?>
		<b class="nclogo_title"><?php echo get_bloginfo( 'name' );?></b>

		<?php endif; ?>

	</a>
	<div class="nclogo_tagline site-description"><?php bloginfo('description'); ?></div>
</div>