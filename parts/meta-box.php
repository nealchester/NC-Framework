<?php $authorlink2 = get_author_posts_url( get_the_author_meta( 'ID' ),get_the_author_meta('user_nicename'));?>

<section class="authorbox">
	<div class="authorbox_avatar"> 
		<?php echo get_avatar ( get_the_author_meta('user_email'), 400 ); ?> 
	</div>

	<div class="authorbox_content">
        <header class="authorbox_header">By <?php echo '<a class="authorbox_link" href="'.$authorlink2.'">'.get_the_author_meta('display_name').'</a>';?></header>
        <?php if(get_the_author_meta('phonenumber')):?> <p class="authorbox_phone"><?php _e('Phone:','nc-framework');?> <?php echo get_the_author_meta('phonenumber'); ?></p><?php endif;?>
        <?php if(get_the_author_meta('description')):?> <p class="authorbox_desc"><?php echo wp_trim_words( get_the_author_meta('description'), 20, ' &hellip; <a href="'.$authorlink2.'">'.__('Read&nbsp;more&nbsp;&rsaquo;','nc-framework').'</a>');?></p> <?php endif; ?>
		<?php get_template_part('parts/meta-box-social');?>
   </div>

</section>

<style>

/* Author Box */

.authorbox {
	--box-avatar-size: 150px;
	--box-color: var(--gray);
	--box-border: none;
	--box-padding: var(--gap);
	--box-avatar-gap:var(--gap);
}

.authorbox {
    display: grid;
    grid-template-columns:var(--box-avatar-size) 1fr;
    grid-gap:var(--box-avatar-gap);
    margin-top:3em;
    margin-bottom:3em;
    position: relative;
    background: var(--box-color);
    border:var(--box-border);
    padding:var(--box-padding)
}

.authorbox_avatar img {
    border-radius: 50%;
    display: block;
}

.authorbox_header {
    text-transform:uppercase;
    font-weight: bold;
    color:#000;
}
.authorbox_header a {
    color:inherit; text-decoration: none;
}

.authorbox_phone {
    margin:0;
}

@media(max-width:500px){
    .authorbox {
        grid-template-columns:1fr;
    }
    .authorbox_avatar img {
    	width:var(--box-avatar-size);
    }
}

</style>