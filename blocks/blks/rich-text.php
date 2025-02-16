<?php

// New Block
add_action('acf/init', 'nc_text_block');
function nc_text_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_text',
		'title'             => __('NC Text Box', 'nc-framework'),
		'description'       => __('A text box', 'nc-framework'),
		'render_callback'   => 'nc_text_block_markup',
		'category'          => 'layout',
		//'icon'              => 'format-image',
		'mode'              => 'preview',
		'keywords'          => array('text', 'paragraphs', 'text box' ),
		'post_types'        => array('post', 'page', 'books'),
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
	$dropcap = get_field('dropcap');
	$tcontent = get_field('text_content');
	$width = get_field('width') ?: '1000';
	$cc = get_field('pcolumn_count');

	$gap = get_field('column_gap') ?: 'clamp(1.5rem, 8vw, 3rem)';
	$rule = get_field('column_rule');

	$text_align = get_field('text_align') ?: 'left';
	$cap_color = get_field('cap_color') ?: '#000';

?>

<?php 
	wp_enqueue_style('nc-blocks-rich-text');
	?>

	<section id="<?php echo $id; ?>" class="nctext<?php if($dropcap) { echo ' nctext-dropcap'; }; if($cc == '2' || $cc == '3') { echo' nctext-cols'; }; echo esc_attr($className); ?>">
		<div class="ncontain" <?php echo nc_animate(); ?>>

		<?php nc_before_content(); ?>

			<div class="nctext_paragraphs nc_content_block_main">
			<?php if($tcontent):?><?php echo $tcontent;?><?php else:?> 
			<p>This is filler sample text. Add a block of text. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and 
			supplies it with the necessary regelialia. It is a paradisematic country, in which 
			roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control 
			about the blind texts it is an almost unorthographic life One day however a small.</p>
			<?php endif; ?>
			</div>

		</div>
	</section>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

	<?php echo'#'.$id; ?>.nctext {
		--column-gap: <?php echo $gap; ?>;
		--column-count: <?php if($cc) { echo $cc; } else { echo 'auto'; }; ?>;
		--column-rule:<?php echo $rule; ?>;

		--text-align: <?php echo $text_align; ?>;
		--text-width: <?php echo $width.'px'; ?>;
	}

	<?php echo'#'.$id; ?>.nctext-dropcap .nctext_paragraphs > p:first-of-type:not(:focus)::first-letter {
		color:<?php echo $cap_color; ?>
	}

<?php nc_block_custom_css(); ?>
</style>

<?php } ?>