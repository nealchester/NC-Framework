<?php

// New Block
add_action('acf/init', 'nc_text_block');
function nc_text_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_text',
		'title'             => __('NC Text Columns', 'nc-framework'),
		'description'       => __('A text box', 'nc-framework'),
		'render_callback'   => 'nc_text_block_markup',
		'category'          => 'layout',
		'icon'              => get_nc_icon('nc-block'),
		'mode'              => 'preview',
		'keywords'          => array('text', 'columns', 'text columns' ),
		'post_types'        => get_post_types(),
		'align'             => 'full',
		'supports'          => array( 
			'align' => array( 'wide', 'full', 'none' ), 
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
		),
	));
}

/* This displays the block */

function nc_text_block_markup( $block, $content = '', $is_preview = false ) {

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
	$cap_color = get_field('cap_color') ?: '#000';
	$cap_lines = get_field('cap_lines') ?: '3';
	
	$dropcap = get_field('dropcap');
	$cc = get_field('pcolumn_count') ?: '3';

	if($dropcap) { $dp = ' nctext-dropcap'; } else { $dp = null; }; 
	if($cc == '2' || $cc == '3' || $cc == '4') { $colcount =' nctext-cols'; } else { $colcount = null; };

	$tcontent = get_field('text_content');
	$width = get_field('width').'px' ?: '220';
	$gap = get_field('column_gap') ?: 'clamp(1.5rem, 8vw, 3rem)';
	$rule = get_field('column_rule') ?: 'solid 1px';

	$justify = get_field('justify_text');

?>

	<?php wp_enqueue_style('nc-blocks-rich-text'); ?>

	<section id="<?php echo $id; ?>" class="nctext<?php echo $dp. $colcount. esc_attr($className); ?>">
		<div class="ncontain" <?php echo nc_animate(); ?>>

			<div class="nctext_paragraphs nc_content_block_main">
			<?php if($tcontent):?><?php echo $tcontent;?><?php else:?> 
			<p><b>This is filler sample text</b>. Start writing your own in the sidebar box. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control 
			about the blind texts it is an almost unorthographic life One day however a small.</p>
			<?php endif; ?>
			</div>

		</div>
	</section>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

	<?php echo'#'.$id; ?>.nctext {
	--column-gap: <?php echo $gap; ?>;
	--column-count: <?php echo $cc; ?>;
	--column-rule:<?php echo $rule; ?>;
	--column-width: <?php echo $width; ?>;
	--text-align: <?php echo $justify; ?>;
	}

	<?php echo'#'.$id; ?>.nctext-dropcap .nctext_paragraphs > p:first-of-type::first-letter {
	--cap-color: <?php echo $cap_color;?>;
	--cap-lines: <?php echo $cap_lines;?>;
	}

<?php nc_block_custom_css(); ?>
</style>

<?php } ?>