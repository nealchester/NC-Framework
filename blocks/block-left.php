<?php

// New Block
add_action('acf/init', 'nc_left_block');
function nc_left_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_left',
            'title'             => __('NC Left Heading', 'nc-framework'),
            'description'       => __('Left aligned heading to text', 'nc-framework'),
            'render_callback'   => 'nc_left_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('left', 'heading', 'text' ),
			'post_types'        => array('post', 'page'),
			'align'             => 'full',
			'supports'          => array( 
									'align' => array( 'wide', 'full' ), 
									'mode' => true,
									'multiple' => true,
									),
        ));
}

/* This displays the block */

function nc_left_block_markup( $block, $content = '', $is_preview = false ) {

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
	$heading = get_field('heading');
	$content = get_field('content');

	$type = get_field('heading_type');

	$size = get_field('heading_size');
	$weight = get_field('heading_weight');
	$case = get_field('heading_case');
	$hcolor = get_field('heading_color');
	$gap = get_field('gap');

	$breakpoint = get_field('breakpoint');

	$bg_color = get_field('bg_color');
	$text_color = get_field('text_color');
	$padding = get_field('padding');
	$width = get_field('max_contain_width');

?>

	<div id="<?php echo $id; ?>" class="ncleft<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<div class="ncontain<?php echo sal_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>

			<?php if($content || $heading):?>

			<header class="ncleft_heading">
				<?php echo'<'.$type.'>'.$heading.'</'.$type.'>'; ?>
			</header>
			<div class="ncleft_content">
				<?php echo $content; ?>
			</div>
		
			<?php else: ?>

			<header class="ncleft_heading">
				<h2>This is a sample heading</h2>
			</header>
			<div class="ncleft_content">
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
					Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, 
					nascetur ridiculus mus.</p><p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
						Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, 
						arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p><p>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies</p>
			</div>

			<?php endif;?>

		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php echo '#'.$id; ?>.ncleft {
	--box-padding: <?php if($padding){ echo $padding; } else { echo'3rem 0'; } ?>;
	--box-text-color: <?php if($text_color){ echo $text_color; } else { echo'inherit'; } ?>;
	--box-bg-color: <?php if($bg_color){ echo $bg_color; } else { echo'transparent'; } ?>;
	--content-max-width: <?php if($width){ echo $width.'px'; } else { echo'var(--width-wide, 1000px)'; } ?>;

	--hd-size:<?php if($size){ echo $size; } else { echo'3em'; } ?>;
	--hd-text-case:<?php if($case){ echo $case; } else { echo'uppercase'; } ?>;
	--hd-weight:<?php if($weight){ echo $weight; } else { echo'400'; } ?>;
	--hd-color:<?php if($hcolor){ echo $hcolor; } else { echo'inherit'; } ?>;
	--hd-gap:<?php if($gap){ echo $gap; } else { echo'3em'; } ?>;
}

<?php if($breakpoint):?>
@media(max-width:<?php echo $breakpoint; ?>px){
	<?php echo '#'.$id; ?>.ncleft {
    --widths:1fr;
    --hd-gap:1.5rem;
  }
}
<?php endif;?>

<?php if(get_field('custom_styles')):?> 
/* Custom CSS */
<?php the_field('custom_styles');?>
<?php endif;?>

</style>
    <?php
}
?>