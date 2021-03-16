<?php if( get_theme_mod( 'show_author_box', false ) == true ): ?>

<?php $authorlink2 = get_author_posts_url( get_the_author_meta( 'ID' ),get_the_author_meta('user_nicename'));?>

<section class="authorbox">
	<div class="authorbox_avatar"> 
		<?php echo get_avatar ( get_the_author_meta('user_email'), 400 ); ?> 
	</div>

	<div class="authorbox_content">
        <header class="authorbox_header">By <?php echo '<a class="authorbox_link" href="'.$authorlink2.'">'.get_the_author_meta('display_name').'</a>';?></header>
        <?php if(get_the_author_meta('phonenumber')):?> <p class="authorbox_phone">Phone: <?php echo get_the_author_meta('phonenumber'); ?></p><?php endif;?>
        <?php if(get_the_author_meta('description')):?> <p class="authorbox_desc"><?php echo wp_trim_words( get_the_author_meta('description'), 20, ' &hellip; <a href="'.$authorlink2.'">Read&nbsp;more&nbsp;&rsaquo;</a>');?></p> <?php endif; ?>
		<?php get_template_part('parts/meta-social');?>
</section>

<?php endif;?>