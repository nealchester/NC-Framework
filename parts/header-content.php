<?php /* 
// Top Navigation 
<nav id="navtop">
	<div class="ncontain">
		<div class="navgroup">
		<?php wp_nav_menu (array( 
		'container' => '', 
		'theme_location' => 'top-menu',
		'menu_class'     => 'navmenu navmenu-right', 
		'menu_id' => 'top-menu',
		'fallback_cb' => 'link_to_menu_editor'
		)); ?>
		<?php get_template_part('parts/searchform'); ?>
		</div>
	</div>
</nav> 
*/ ?>

<header id="header">

	<div class="ncontain">

		<?php get_template_part('parts/site-title');?>

		<p class="hidetext">
			<a href="#body"><i>Jump to Main Content</i></a>
		</p>

		<?php 
			wp_nav_menu (array( 
			'container' => '', 
			'theme_location' => 'header-menu',
			'menu_class'     => 'navmenu', 
			'menu_id' => 'header_menu',
			'fallback_cb' => 'link_to_menu_editor'
			)); 
		?>

		<div hidden class="header_tagline"><?php bloginfo('description');?></div>

		<div hidden class="phonebutton">
			<?php echo do_shortcode('[nc-phone-link]'); ?>
		</div>

		<div hidden class="header_sociallinks">
			<?php echo do_shortcode('[nc-social-links]');?> 
		</div>

		<label hidden class="mpanel_button" for="mpanel" aria-hidden="true">
			<?php get_template_part('img/icon-menu-ham.svg');?>
		</label>

		<label hidden class="ncsearchtrigger" for="ncsearchinput" title="reveal search box">
			<span class="hidetext">Search</span>
			<svg class="ncsearchtrigger_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><g transform="translate(0 -13.5)"><g transform="translate(0 13.5)"><path d="M20.149,31.771,30,41.622,28.122,43.5l-9.851-9.851a11.284,11.284,0,1,1,1.878-1.878Zm-8.863,1.644a8.63,8.63,0,1,0-8.63-8.63A8.63,8.63,0,0,0,11.285,33.415Z" transform="translate(0 -13.5)"/></g></g></svg>
		</label>

	</div>

	<form class="ncsearchreveal" role="search" method="get" action="<?php echo home_url(); ?>/">
			<label class="hidetext">Search Form</label>
    	<input class="ncsearchreveal_input" id="ncsearchinput" name="s" type="search" placeholder="Search...">
    	<button class="ncsearchreveal_close" tablindex="0" type="button" title="close search">
			<svg class="ncsearchreveal_x" alt="x icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20" height="20" viewBox="0 0 131.395 131.396" enable-background="new 0 0 131.395 131.396" xml:space="preserve"><g class="ncsearchreveal_xcolor"><rect x="-18.213" y="56.698" transform="matrix(0.7071 0.7071 -0.7071 0.7071 65.698 -27.2126)" width="167.821" height="17.999"></rect><rect x="56.697" y="-18.212" transform="matrix(0.7071 0.7071 -0.7071 0.7071 65.701 -27.2126)" width="18" height="167.819"></rect></g></svg>  
    	</button>
	</form>
</header>

<?php /* 
// Bottom Navigation
<nav id="navbottom">
	<div class="ncontain">
		<div class="navgroup">
		<?php wp_nav_menu (array( 
		'container' => '', 
		'theme_location' => 'third-menu',
		'menu_class'     => 'navmenu', 
		'menu_id' => 'third-menu',
		'fallback_cb' => 'link_to_menu_editor'
		)); ?>
		<?php get_template_part('parts/searchform'); ?>
		</div>
	</div>
</nav> 
*/ ?>


<label hidden class="mbuttonbar" for="mpanel" aria-hidden="true">
	<div class="ncontain">
		<?php get_template_part('img/icon-menu-ham.svg');?>
		<span class="mbuttonbar_label">Navigation</span> 
	</div>
</label>