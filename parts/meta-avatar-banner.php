<?php if( get_theme_mod( 'show_author_avatar', true ) == true ): ?>

<?php 
	global $post;
	$a_id = $post->post_author;
	$author_meta_banner = get_author_posts_url( get_the_author_meta( 'ID', $a_id ), get_the_author_meta('user_nicename', $a_id) );
 ?>
<div class="postmeta">
	<div class="postmeta_container">
		<div class="postmeta_avatar">
			<?php echo get_avatar ( get_the_author_meta('user_email', $a_id), 100 ); ?>
		</div>
		<div class="postmeta_content">
			<div class="postmeta_name" itemprop="author" itemscope="" itemtype="http://schema.org/Person">By <a itemprop="name" rel="author" href="<?php echo esc_url($author_meta_banner) ?>"><?php echo get_the_author_meta('display_name', $a_id); ?></a></div> 
			<span class="postmeta_pubdate nowrap" itemprop="datePublished"><?php echo get_the_time(get_option('date_format')); ?></span>
			<span class="postmeta_update nowrap hide" itemprop="dateModified"><?php the_modified_date(); ?></span>

			<?php if(get_theme_mod('show_comments_posts',true) == true && comments_open()):?>
			<span class="postmeta_commentlink">
				| <?php comments_popup_link('Post a comment','1 Comment','% Comments', 'ncanchorscroll');?>
			</span>
			<?php endif; ?>
		</div>	
	</div>
</div>

<?php endif;?>