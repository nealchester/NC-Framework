<?php if(get_theme_mod( 'show_featured_image', true ) == true && get_the_post_thumbnail() ):?>

<?php 
// only display featured image and post meta on the first page of a paginated post
global $page; if($page == 1):?>

	<?php 
	$thumbnail = get_post( get_post_thumbnail_id());
	  $img_alt = get_post_meta($thumbnail->ID, '_wp_attachment_image_alt', true );	
	$img_title = get_post(get_post_thumbnail_id())->post_title;
	  $caption = get_post(get_post_thumbnail_id())->post_excerpt;
	
	?>

	<div class="featuredimage alignwide">
		<figure class="wp-caption">
		  <?php the_post_thumbnail( 'large' ); ?>
			<?php if($caption){ echo'<figcaption class="wp-caption-text">'.$caption.'</figcaption>';}?>
		</figure>	
	</div>

<?php endif;// end conditional display for paginated post ?>	

<?php endif;?>