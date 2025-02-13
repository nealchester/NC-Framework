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
						'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'edit',
            'keywords'          => array('accordion', 'faqs', 'frequently asked questions', 'answers', 'questions' ),
            'post_types'        => array('post', 'page'),
            'align'             => 'none',
            'supports'          => array( 
                  'align' => array( 'full','wide'), 
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
	$hd = get_field('heading') ?: 'h3';
	$mobile = get_field('mobile') ?: '600';
	$choose = get_field('choose') /* write or post */;
	$collapse = get_field('collapse');

?>

	<?php 
	wp_enqueue_style('nc-blocks-accordion');
	wp_enqueue_script('nc-blocks-accordion'); 
	?>
	
	<div id="<?php echo $id; ?>" class="nccordion_container<?php echo esc_attr($className); ?>">
	
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
					$acc_heading = get_sub_field('heading');
					$acc_content = get_sub_field('content');
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

<style id="<?php echo $id; ?>-block-css">

<?php nc_block_custom_css(); ?>

</style>


<?php
}
?>