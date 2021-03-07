<?php

// New Block
add_action('acf/init', 'nc_columns_block');
function nc_columns_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_columns',
            'title'             => __('NC Columns', 'nc-framework'),
            'description'       => __('Content within columns', 'nc-framework'),
            'render_callback'   => 'nc_columns_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'edit',
            'keywords'          => array('columns', 'column' ),
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

function nc_columns_block_markup( $block, $content = '', $is_preview = false ) {

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
	$gallery = get_field('the_gallery');
	$mdisplay = get_field('meta_display');
	$mposition = get_field('meta_position');
	$link2img = get_field('link_to_image');

	$imgp = get_field('image_position');
	
	$clayout = get_field('column_layout');
	$cstyle = get_field('column_style');
	$columns = get_field('column_count');
	$cgap = get_field('column_gap');
	$rgap = get_field('row_gap');
	$ratio = get_field('thumb_shape');

	$cc_position = get_field('cc_position');
	$cc_position_bp = get_field('cc_position_bp');

	$bpadding = get_field('bottom_padding') ?: '3rem';

	$breaklayout = get_field('breakpoint_layout');
	$breakpoint = get_field('breakpoint');

?>

	<div id="<?php echo $id; ?>" class="ncolumns_box<?php echo esc_attr($className);?>" <?php echo nc_block_attr();?>>
		<div class="ncontain<?php echo sal_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>
			
		<?php nc_before_content(); ?>

			<?php if( have_rows('columns') ): ?>
			<div class="ncolumns nc_content_block_main<?php if($columns && $clayout == 'ncolumns-fixed') { echo ' '.$columns; } echo ' '.$cstyle.' '.$clayout.' '.$breaklayout.' '.$mposition;?>">
			
			<?php $i = 1; while( have_rows('columns') ): the_row(); $image = get_sub_field('image');?>

			<div class="ncolumns_c<?php echo $i; ?>">
				<?php if($image && $imgp == 'before') { echo '<div class="ncolumns_image">'.wp_get_attachment_image( $image, 'medium').'</div>'; }; ?>
				<div class="ncolumns_content"><?php the_sub_field('column_content');?></div>
				<?php if($image && $imgp == 'after') { echo '<div class="ncolumns_image">'.wp_get_attachment_image( $image, 'medium').'</div>'; }; ?>
			</div>

			<?php $i++; endwhile; ?>

			</div>
			<?php endif;?>

			<?php nc_after_content(); ?>
		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

<?php echo '#'.$id; ?>.ncolumns_box .ncontain > .ncolumns {
	--count: <?php if($columns == 'ncolumns-1') { echo '1';}
			  elseif ($columns == 'ncolumns-2') { echo '2';} 
			  elseif ($columns == 'ncolumns-3') { echo '3';} 
			  elseif ($columns == 'ncolumns-4') { echo '4';} 
			  elseif ($columns == 'ncolumns-5') { echo '5';} 
			 ?>;
    --column-gap: <?php if($cgap){ echo $cgap; } else { echo'1.5rem'; } ?>;
    --row-gap: <?php if($rgap){ echo $rgap; } else { echo'1.5rem'; } ?>;
}

<?php if($cc_position == 'right'):?>
<?php echo '#'.$id; ?> .ncolumns_image img { margin-left: auto; } 
<?php echo '#'.$id; ?> .ncolumns_content { text-align:right; }
<?php endif;?>

<?php if($cc_position == 'center'):?>
<?php echo '#'.$id; ?> .ncolumns_image img { margin-left: auto; margin-right:auto; }
<?php echo '#'.$id; ?> .ncolumns_content { text-align:center; }
<?php endif;?>


<?php if($breakpoint && $breaklayout == 'ncolumns-scroll'):?>
@media(max-width:<?php echo $breakpoint; ?>px){

	<?php echo '#'.$id; ?> .ncolumns-scroll {
		display:grid;
		--column-gap:var(--gap);
		grid-template-columns: repeat(30, minmax(var(--min-col-width), 1fr));
		overflow-x:auto;
		overflow-y:hidden;
		padding-left:var(--gap);
		margin-left: calc(-1 * var(--gap));
		margin-right: calc(-1 * var(--gap));
		margin-bottom: calc(-1 * <?php echo $bpadding; ?>);
	}

	<?php if($cc_position_bp == 'right'):?>
	<?php echo '#'.$id; ?> .ncolumns-scroll .ncolumns_image img { margin-left: auto; } 
	<?php echo '#'.$id; ?> .ncolumns-scroll .ncolumns_content { text-align:right; }
	<?php endif;?>

	<?php if($cc_position_bp == 'center'):?>
	<?php echo '#'.$id; ?> .ncolumns-scroll .ncolumns_image img { margin-left: auto; margin-right:auto; }
	<?php echo '#'.$id; ?> .ncolumns-scroll .ncolumns_content { text-align:center; }
	<?php endif;?>

	<?php echo '#'.$id; ?> .ncolumns-scroll.ncolumns-borders {
		--column-gap:<?php if($cgap){ echo $cgap; } else { echo'1.5rem'; } ?>;
	}

	<?php echo '#'.$id; ?> .ncolumns-scroll > * { 
		min-width:var(--min-col-width);
		margin-bottom: <?php echo $bpadding; ?>;
	}

	<?php echo '#'.$id; ?> .ncolumns-scroll:after {
		content:''; width:1px; height:1px;
	}

}
<?php elseif($breakpoint && $breaklayout == 'ncolumns-stack'):?>
@media(max-width:<?php echo $breakpoint; ?>px){

	<?php echo '#'.$id; ?> .ncolumns-stack { grid-template-columns: 1fr; }
	<?php echo '#'.$id; ?> .ncolumns-stack.ncolumns-borders { grid-gap: var(--column-gap); }
	<?php echo '#'.$id; ?> .ncolumns-stack.ncolumns-borders > .ncolumns_content:after {       
		width:100%;
      	height:1px;
      	right:auto;
		bottom: calc( -1 * var(--column-gap) / 2 );
		top:auto;
	}

	<?php if($cc_position_bp == 'right'):?>
	<?php echo '#'.$id; ?> .ncolumns_image img { margin-left: auto; } 
	<?php echo '#'.$id; ?> .ncolumns_content { text-align:right; }
	<?php endif;?>

	<?php if($cc_position_bp == 'center'):?>
	<?php echo '#'.$id; ?> .ncolumns_image img { margin-left: auto; margin-right:auto; }
	<?php echo '#'.$id; ?> .ncolumns_content { text-align:center; }
	<?php endif;?>

}

<?php endif;?>

<?php nc_block_custom_css(); ?>

</style>
    <?php
}
?>