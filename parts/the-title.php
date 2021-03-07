<?php if(get_theme_mod('main_title_format', 'plain-text') == 'plain-text' && !is_page_template('templates/blank.php') ):?>

<div id="maintitle">
	<?php get_template_part('parts/headings');?>
</div>

<?php endif;?>