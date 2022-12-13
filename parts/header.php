<!DOCTYPE html>
<html <?php language_attributes(); ?> id="pagetop">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<div id="wrapper">

	<header id="header">
		<div class="ncontain">

			<?php get_template_part('parts/site-title');?>
			
			<p class="hidetext">
				<a href="#body"><i><?php _e('Jump to Main Content','nc-framework'); ?></i></a>
			</p>

			<?php 
				wp_nav_menu (array( 
				'container' => 'nav', 
				'container_class' => 'header_nav',
				'container_aria_label' => 'primary navigation',
				'theme_location' => 'header-menu',
				'menu_class'     => 'header_menu', 
				'menu_id' => 'header_menu',
				'fallback_cb' => 'link_to_menu_editor'
				)); 
			?>

			<?php // get_template_part('parts/header-search-button');?>

		</div>

		<?php // get_template_part('parts/header-search-box');?>

	</header>

	
	<?php // if(!is_attachment()) { get_template_part('parts/the-title-banner'); }?>

	<div id="body" class="ncontent"> 
	<main class="ncontent_main">