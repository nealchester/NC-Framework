<?php 
	$authorlink = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta('user_nicename') );
 ?>
<div class="postmeta">
	<div class="postmeta_container">
		<div class="postmeta_avatar">
			<?php echo get_avatar ( get_the_author_meta('user_email'), 100 ); ?>
		</div>
		<div class="postmeta_content">
			<div class="postmeta_name" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><?php _e('By','nc-framework');?> <a itemprop="name" rel="author" href="<?php echo esc_url($authorlink) ?>"><?php the_author(); ?></a></div> 
			<span class="postmeta_pubdate nowrap" itemprop="datePublished"><?php the_date(); ?></span>
			<span class="postmeta_update nowrap hide" itemprop="dateModified"><?php the_modified_date(); ?></span>

			<?php if(get_theme_mod('show_comments_posts',true) == true && comments_open()):?>
			<span class="postmeta_commentlink">
				| <?php comments_popup_link(
					__('Post a comment','nc-framework'),
					__('1 Comment','nc-framework'),
					__('% Comments','nc-framework'), 
					'postmeta_anchor',
					);?>
			</span>
			<?php endif; ?>
		</div>	
	</div>
</div>

<style>

/* Post meta */

.postmeta { position: relative; margin-bottom:3em }
.postmeta_container { display:flex; font-size:var(--txt-small); align-items:center; }
.postmeta_avatar img { border-radius:50%; width:100%; display: block; }
.postmeta_avatar {max-width: 50px; margin-right:1em; }
.postmeta_content { flex-grow:1;}

</style>