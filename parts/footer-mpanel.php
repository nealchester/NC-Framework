<!-- Mobile Menu Panel -->

<input class="hide mpanel_input" type="checkbox" id="mpanel" name="nc_show_menu" value="mpanel">

<div class="mpanel">

	<label class="mpanel_close" for="mpanel" aria-hidden="true">
		<?php get_template_part('img/icon-x.svg');?>	
	</label>

	<?php get_template_part('parts/site-title'); ?>

	<?php if (dynamic_sidebar('mobilepanel')) :?>
	<?php else :?>
	<?php get_search_form();?>
	
	<?php wp_nav_menu (array( 
	'container' => false, 
	'theme_location' => 'mobile-menu',
	'menu_class' => 'navmenu navmenu-vertical navmenu-list', 
	'menu_id' => '',
	'fallback_cb' => 'nc_link_to_menu_editor'
	)); ?>

	<?php endif;?>
</div>

<label class="mpanel_underlay" for="mpanel" aria-hidden="true"></label>