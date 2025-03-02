<?php

// New Block
add_action('acf/init', 'nc_canvas_block');
function nc_canvas_block() {

	// register a items block
	acf_register_block_type(array(
			'name'              => 'nc_canvas',
			'title'             => __('NC Canvas', 'nc-framework'),
			'description'       => __('Enter anything you want with added support for native columns', 'nc-framework'),
			'render_callback'   => 'nc_canvas_block_markup',
			'category'          => 'common',
			'icon'              => get_nc_icon('nc-block'),
			'mode'              => 'preview',
			'keywords'          => array('columns', 'column' ),
			'post_types'        => get_post_types(),
			'align'             => 'full',
			'supports'          => array( 
				'align' => array( 'wide', 'full' ), 
				'mode' => true,
				'multiple' => true,
				'jsx' => true
				),
	));
}

/* This displays the block */

function nc_canvas_block_markup( $block, $content = '', $is_preview = false ) {

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
	

	$cgap = get_field('column_gap') ?: '3';
	$rgap = get_field('row_gap') ?: '2.5';

	$mcolwidth = get_field('min_col_width').'px' ?: '250';

	$cborders = get_field('column_borders');
	$cbcolor = get_field('column_border_color') ?: 'currentColor';

	$breakscroll = get_field('breakpoint_scroll');
	$breakpoint = get_field('breakpoint');

?>
	

	<div id="<?php echo $id; ?>" class="ncanvas<?php echo esc_attr($className);?>" <?php echo nc_block_attr();?>>
		<div class="ncontain">
			<?php echo nc_inner_col_blocks(); ?>
		</div>
	</div>

<style id="<?php echo $id; ?>-css">
	
<?php nc_box_styles($id); ?>

<?php echo '#'.$id; ?> .wp-block-columns {
	--column-gap: <?php echo $cgap.'rem'; ?>;
	--row-gap: <?php echo $rgap.'rem'; ?>;
	--column-border-color: <?php echo $cbcolor; ?>;
	--min-col-width: <?php echo $mcolwidth; ?>;
	column-gap: var(--column-gap);
	row-gap: var(--row-gap);
}

<?php if( $cborders ):?>

	<?php echo '#'.$id; ?> .wp-block-column:not(:last-child) { 
		position:relative; 
	}

	<?php echo '#'.$id; ?> .wp-block-column:not(:last-child):after {
		display:block;
		content:'';
		width: 0.008em;
		height:100%;
		background:var(--column-border-color, currentColor);
		position:absolute;
		right:calc( -1 * var(--column-gap) / 2 );
		top:0;
	}

<?php endif; ?>


<?php if($breakpoint && $breakscroll):?>
@media(max-width:<?php echo $breakpoint; ?>px){

	<?php echo '#'.$id; ?> .wp-block-columns {
		display:grid !important;
		--column-gap:var(--gap);
    grid-template-columns: auto;
    grid-auto-flow: column;
		overscroll-behavior-inline: contain;
    scroll-snap-type: inline mandatory;
    scroll-padding-inline: var(--gap);
		overflow-x:auto;
		overflow-y:hidden;
		padding-inline:var(--gap);
		margin-inline: calc(-1 * var(--gap));
		margin-bottom: calc(-1 * var(--u-padding) );
	}

	<?php echo '#'.$id; ?> .wp-block-column:after {
		display: none !important;
	}

	<?php echo '#'.$id; ?> .wp-block-column { 
		min-width:var(--min-col-width);
		scroll-snap-align: start;
		margin-bottom: var(--u-padding);
	}

}

<?php elseif($breakpoint && !$breakscroll):?>
@media(max-width:<?php echo $breakpoint; ?>px){

	<?php echo '#'.$id; ?> .wp-block-columns.is-not-stacked-on-mobile {
		flex-direction: column;
	}

	<?php if( $cborders ):?>
	<?php echo '#'.$id; ?> .wp-block-column:after {
		display: none !important;
	}
	<?php endif;?>

}
<?php endif; ?>

<?php nc_block_custom_css(); ?>

</style>

<?php } ?>