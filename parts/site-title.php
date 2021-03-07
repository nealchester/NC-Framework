<div class="nclogo"> 
	<a href="<?php echo home_url();?>" rel="home" class="nclogo_anchor">
	<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		if ( has_custom_logo() ) {
		echo '<img src="'. esc_url( $logo[0] ) .'" class="nclogo_image" alt="'. get_bloginfo('name') .'" width="'.get_theme_mod('nc_logo_width', '250px').'px">';
		} else {
		echo '<b class="nclogo_title">'. get_bloginfo( 'name' ) .'</b>';
		}
		?>
	</a>
	<div class="nclogo_tagline site-description"><?php bloginfo('description'); ?></div>
</div>