<?php

// New Block
add_action('acf/init', 'nc_nav_block');
function nc_nav_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_nav',
            'title'             => __('NC Page Menu', 'nc-framework'),
            'description'       => __('A navigation menu bar.', 'nc-framework'),
            'render_callback'   => 'nc_nav_block_markup',
            'category'          => 'layout',
            'icon'              => get_nc_icon('nc-block'),
            'mode'              => 'preview',
            'keywords'          => array('nav', 'menu', 'navigation'),
			'post_types'        => get_post_types(),
			'align'             => 'full',
			'supports'          => array( 
									'align' => array( 'wide', 'full' ), 
									'mode' => true,
									'multiple' => false,
									),
        ));
}

/* This displays the block */

function nc_nav_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }	

	//ACF Block

	$position = get_field('menu_position') ?: 'center';
	$highlight = get_field('current_item');
	$sticky = get_field('sticky_menu');
	// $styling = get_field('styling');
	$breakpoint = get_field('breakpoint');
	$scrollpoint = get_field('scrollpoint');

	$height = get_field('menu_height') ?: '65';

?>

	<nav id="<?php echo $id; ?>" class="ncmenu_nav alignfull <?php if($sticky){ echo'ncmenu-sticky'; };?>" <?php echo nc_block_attr(); ?> aria-label="On page navigation">
		<div class="ncontain">
			<?php // nc_before_content();?>
		<ul class="ncmenu">
		<?php if( have_rows('menu') ): ?>

			<?php while( have_rows('menu') ): the_row(); 
				$link = get_sub_field('link');
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<li class="ncmenu_item">
				<a class="ncmenu_link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo esc_html($link_title); ?></a>
			</li>
			<?php endwhile; ?>
		<?php else: ?>

			<li class="ncmenu_item ncmenu_active"><a class="ncmenu_link" href="#100">Current</a></li>
			<li class="ncmenu_item"><a class="ncmenu_link" href="#100">Services</a></li>
			<li class="ncmenu_item"><a class="ncmenu_link" href="#100">Testimonials</a></li>
			<li class="ncmenu_item"><a class="ncmenu_link" href="#100">About</a></li>
			<li class="ncmenu_item"><a class="ncmenu_link" href="#100">Contact</a></li>

		<?php endif; ?>
		</ul>
		<?php // nc_after_content();?>
		</div>
	</nav>

	<style id="<?php echo $id; ?>-css">

		.alignfull { scroll-margin-top: <?php echo $height.'px'; ?> }

		<?php echo '#'.$id; ?> {
			background: <?php echo get_field('nav_bar_color') ?: "#fff"; ?>;
			transition:0.5s;
		}

		<?php echo '#'.$id; ?> .ncmenu {
			display:flex;
			list-style-type: none;
			padding-left:0;
			gap: 1em;
			margin:0;
			<?php echo 'justify-content: '.$position.';'; ?>
			flex-wrap:nowrap;
			overflow-x:auto;
			max-width:100%; 
			width:100%; 
		}

		<?php echo '#'.$id; ?>.ncmenu-sticky {
			position: sticky;
			top:0;
			z-index: 200;
		}

		<?php echo '#'.$id; ?> .ncmenu_link {
			height:<?php echo $height.'px'; ?>;
			text-decoration:none;
			white-space: nowrap; 
			display: flex;
			align-items: center;
			color: currentColor;
		}

		<?php if($sticky && $breakpoint):?>
		@media(max-height:<?php echo $breakpoint.'px'; ?>){
			<?php echo '#'.$id; ?>.ncmenu-sticky { position:static; }
		}
		<?php endif;?>

		<?php if($scrollpoint):?>
		@media(max-width:<?php echo $scrollpoint.'px'; ?>) {
			<?php echo '#'.$id; ?> .ncmenu { 
				justify-content: flex-start;
			}
			<?php echo '#'.$id; ?> .ncmenu > li:first-child .ncmenu_link { padding-left:var(--gap); }
			<?php echo '#'.$id; ?> .ncmenu > li:last-child .ncmenu_link { padding-right:var(--gap); }
			<?php echo '#'.$id; ?> .ncontain { width:100%; max-width:100% !important; }
		}
		<?php else:?>
		@media(max-width:768px) {
			<?php echo '#'.$id; ?> .ncmenu { 
				justify-content: flex-start;
			}
			<?php echo '#'.$id; ?> .ncmenu > li:first-child .ncmenu_link { padding-left:var(--gap); }
			<?php echo '#'.$id; ?> .ncmenu > li:last-child .ncmenu_link { padding-right:var(--gap); }
		}
		<?php endif; ?>

		<?php nc_box_styles($id); ?>

		<?php nc_block_custom_css();?>

	</style>

	<?php if($sticky):?> 
		<script id="ncmenu-scroll-script">
			// When the user scrolls the page, execute myFunction
			window.onscroll = function() {myFunction()};

			// Get the navbar
			var navbar = document.getElementById("<?php echo $id; ?>");

			// Get the offset position of the navbar
			var sticky = navbar.offsetTop;

			// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
			function myFunction() {
				if (window.pageYOffset >= sticky) {
					navbar.classList.add("ncmenu-stuck")
				} else {
					navbar.classList.remove("ncmenu-stuck");
				}
			} 

			/*
			Add a class of "active" to an item when it's clicked in a menu.
			*/

			jQuery(function () {
				jQuery(".ncmenu_item").click(function () {
					jQuery(".ncmenu_item").addClass("ncmenu_active").not(this).removeClass("ncmenu_active");
				});
			});	

		</script>
	<?php endif; ?>

<?php
}
?>