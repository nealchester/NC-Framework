<?php 
	if( is_page_template('templates/blank.php') or is_author() ){}

	elseif( is_singular() ) {
		if( get_theme_mod('main_title_format', 'plain-text') == 'hero-text' ) { get_template_part('components/hero'); }
		elseif(get_theme_mod('main_title_format', 'plain-text') == 'split-text') { get_template_part('components/split'); }
	}

	elseif( is_home() or is_archive() or is_404() or is_post_type_archive() or is_search() ) {
		if( get_theme_mod('main_title_format', 'plain-text') == 'hero-text' 
			or get_theme_mod('main_title_format', 'plain-text') == 'split-text') {
			get_template_part('components/banner');
		}
	}
?>