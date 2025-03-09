<?php

// New Block
add_action('acf/init', 'nc_accordion_block');
function nc_accordion_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_accordion',
            'title'             => __('NC Accordion', 'nc-framework'),
            'description'       => __('Title, content and links.', 'nc-framework'),
            'render_callback'   => 'nc_accordion_block_markup',
						'category'          => 'common',
            'icon'              => get_nc_icon('nc-block'),
            'mode'              => 'preview',
            'keywords'          => array('accordion', 'details', 'summary', 'faqs', 'answers', 'questions' ),
            'post_types'        => get_post_types(),
            'align'             => 'none',
            'supports'          => array( 
                  'align' => array( 'none','full','wide'), 
                  'mode' => true,
                  'multiple' => true,
									),			
        ));
}

/* This displays the block */

function nc_accordion_block_markup( $block, $content = '', $is_preview = false ) {

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

	// ACF Block
	
  $select_links = get_field('select_links', false, false);
  $truncate = get_field('tuncate_char_limit') ?: '100';
	$content = get_field('display_content');
	$mobile = get_field('mobile') ?: '600';
	$choose = get_field('choose') /* write or post */;
	$collapse = get_field('collapse');

?>

	<?php 
	wp_enqueue_style('nc-blocks-accordion');
	wp_enqueue_script('nc-blocks-accordion'); 
	?>
	
	<div id="<?php echo $id; ?>" class="nccordion_container ncblock<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<div class="ncontain">
			<?php if( $choose == 'post' ):?>

			<?php $args = array(
				'post_type' => 'any',
				'posts_per_page' => -1,
				'post__in' => $select_links,
				'post_status' => 'publish',
				'orderby' => 'post__in',
				'ignore_sticky_posts' => true
      );
			?>

			<?php $queryfaqs = new WP_Query($args); 
			if ( $queryfaqs->have_posts() && $select_links ) : ?>

			<div class="nccordion">
      <?php while ( $queryfaqs->have_posts() ) : $queryfaqs->the_post(); ?>

			<details class="nccordion_details">
				<summary class="nccordion_header" id="faq-<?php the_ID(); ?>" title="<?php echo get_the_title( get_the_ID() );?>"><?php echo get_the_title( get_the_ID() );?></summary>  
				<div class="nccordion_content">
					<?php if($content == 'truncate') :?>
					<?php echo substr( get_the_excerpt( get_the_ID() ), 0, $truncate );?><span class="nccordion_ell">&hellip;</span> <a href="<?php echo get_the_permalink( get_the_ID() ); ?>" class="nccordion_rmore"><?php _e('Read more','nc-framework');?></a>
					<?php else :?>
					<?php the_content(get_the_ID());?>  
					<?php endif;?>
				</div>
			</details>
      
			<?php endwhile; ?>
			</div>

			 <?php wp_reset_postdata();?>
			 <?php else : ?>
				<div class="nccordion">
					<p><?php _e('No posts have been selected yet. Select some posts to add here or write your own content.','nc-framework');?></p>
			 </div>
			<?php endif; // end loop ?>

			<?php elseif( $choose == 'write' && have_rows('custom_content') ):?>

				<div class="nccordion">
				<?php while( have_rows('custom_content') ): the_row(); 
					$acc_heading = get_sub_field('heading') ?:'Heading';
					$acc_content = get_sub_field('content') ?: 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.';
					$acc_open = get_sub_field('open');
				?>
					<details class="nccordion_details"<?php if ($acc_open){ echo' open'; };?>>
						<summary class="nccordion_header"><?php echo $acc_heading; ?></summary>  
						<div class="nccordion_content">
							<?php echo $acc_content; ?>
						</div>
					</details>

			<?php endwhile; ?>
			</div>

				</div>

				<?php else : ?>
					<div class="nocontent">
						<p><?php _e('Chose to display posts or write your own content. Use the sidebar settings to begin.','nc-framework');?></p>
					</div>
			<?php endif;?>
		</div>

	<?php if( $collapse ):?>

		<script id="<?php echo 'collapse-'.$id; ?>">
			
			// Credit to: https://lebcit.github.io/posts/automatically-close-other-details/

			const allDetails = document.querySelectorAll("<?php echo '#'.$id; ?> details")
			allDetails.forEach((details) => {
			details.addEventListener("toggle", (e) => {
			if (details.open) {
			allDetails.forEach((details) => {
			if (details != e.target && details.open) {
				details.open = false
			}
			})
			}
			})
			})
		</script>

	<?php endif;?>

<style id="<?php echo $id; ?>-css">

<?php echo '#'.$id; ?> .nccordion {
  --acc-border-color: <?php echo get_field('acc_border_color') ?: '#aaa';?>;
  --acc-bg-color: <?php echo get_field('acc_bg_color') ?: '#fff';?>;
  --acc-border-radius: <?php echo get_field('acc_border_radius').'px' ?: '0';?>;
  --acc-text-color: <?php echo get_field('acc_text_color') ?: 'currentColor';?>;
}

<?php if( get_field('acc_icon_style') == 'arrow' ):?>
<?php echo '#'.$id; ?> .nccordion {

	.nccordion_header:before {
    content: '\e901';
		transform: rotate(-90deg);
		font-size: 0.7em;
	}

	.nccordion_details[open] .nccordion_header:before {
  	transform: rotate(90deg);
	}
}
<?php endif;?>

<?php nc_box_styles($id); ?>

<?php nc_block_custom_css(); ?>

</style>


<?php } ?>