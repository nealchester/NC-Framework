<!DOCTYPE html>
<html <?php language_attributes(); ?> id="pagetop">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">


<?php get_template_part('parts/header-content');?>

	
<?php if(!is_attachment()) { get_template_part('parts/banner'); }?>