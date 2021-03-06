<?php

// New Block
add_action('acf/init', 'nc_nav_block');
function nc_nav_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_nav',
            'title'             => __('NC Navmenu', 'nc-framework'),
            'description'       => __('A navigation menu bar.', 'nc-framework'),
            'render_callback'   => 'nc_nav_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('nav', 'menu', 'navigation'),
			'post_types'        => array('post', 'page'),
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
	$styling = get_field('styling');
	$breakpoint = get_field('breakpoint');
	$scrollpoint = get_field('scrollpoint');

	$height = get_field('menu_height') ?: '65';
	$max_width = get_field('max_width') ?: '1000';

?>
	<div id="<?php echo $id; ?>" class="alignfull <?php if($sticky){ echo'navmenu-sticky ncsticky'; } echo nc_block_attr(); ?>">
	<div class="ncontain">
		<?php nc_before_content();?>
	<ul class="navmenu navmenu-bar">
	<?php if( have_rows('menu') ): ?>

		<?php while( have_rows('menu') ): the_row(); 
			$link = get_sub_field('link');
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		?>
		<li class="navmenu_li">
			<a class="navmenu_link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo esc_html($link_title); ?></a>
		</li>
		<?php endwhile; ?>
	<?php else: ?>

		<li class="navmenu_li"><a class="navmenu_link navmenu-current" href="#100">Current</a></li>
		<li class="navmenu_li"><a class="navmenu_link" href="#100">Services</a></li>
		<li class="navmenu_li"><a class="navmenu_link" href="#100">Testimonials</a></li>
		<li class="navmenu_li"><a class="navmenu_link" href="#100">About</a></li>
		<li class="navmenu_li"><a class="navmenu_link" href="#100">Contact</a></li>

	<?php endif; ?>
	</ul>
	<?php nc_after_content();?>
	</div>
	</div>

	<style id="<?php echo $id; ?>-block-css">

		.alignfull { scroll-margin-top: <?php echo $height.'px'; ?> }

		<?php echo '#'.$id; ?> {
			background: <?php echo get_field('nav_bar_color') ?: "#fff"; ?>;
		}

		<?php echo '#'.$id; ?> .navmenu {
			--menu-align-items:<?php echo $position; ?>;
		}

		<?php echo '#'.$id; ?> .ncontain {
			--width-max: <?php echo $max_width.'px'; ?>
		}

		<?php echo '#'.$id; ?> .navmenu-bar { 
		max-width:100%; 
		width:100%; 
		background:var(--menu-bg-color); 
		justify-content:var(--menu-align-items);
		flex-wrap:nowrap;
		overflow-x:auto;
		}

		<?php echo '#'.$id; ?> .navmenu-bar > li > a { white-space: nowrap; }

		<?php echo '#'.$id; ?> .navmenu_link {
			height:<?php echo $height.'px'; ?>;
			text-decoration:none;
		}

		<?php if($sticky && $breakpoint):?>
		@media(max-height:<?php echo $breakpoint.'px'; ?>){
			<?php echo '#'.$id; ?>.navmenu-sticky { position:static; }
		}
		<?php endif;?>

		<?php if($scrollpoint):?>
		@media(max-width:<?php echo $scrollpoint.'px'; ?>) {
			<?php echo '#'.$id; ?> .navmenu-bar { 
				--menu-align-items: flex-start;
			}
			<?php echo '#'.$id; ?> .navmenu-bar > li:first-child .navmenu_link { padding-left:var(--gap); }
			<?php echo '#'.$id; ?> .navmenu-bar > li:last-child .navmenu_link { padding-right:var(--gap); }
			<?php echo '#'.$id; ?> .ncontain { width:100%; max-width:100%; }
		}
		<?php else:?>
		@media(max-width:768px) {
			<?php echo '#'.$id; ?> .navmenu-bar { 
				--menu-align-items: flex-start;
			}
			<?php echo '#'.$id; ?> .navmenu-bar > li:first-child .navmenu_link { padding-left:var(--gap); }
			<?php echo '#'.$id; ?> .navmenu-bar > li:last-child .navmenu_link { padding-right:var(--gap); }
		}
		<?php endif; ?>

		<?php if(get_field('custom_styles')):?> 
		/* Custom CSS */
		<?php the_field('custom_styles');?>
		<?php endif;?>

	</style>

	<?php if($sticky){ 
		wp_enqueue_script('sticky-script', get_theme_file_uri('/js/sticky.js'), '', '1', true);
	}?>

<?php
}
?>