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

.authorbox .socialbuttons {
    font-size: 0.8em;
}

.authorbox .socialbuttons_link {
    margin-right: 0.5em;
}

.authorbox .socialbuttons_link:hover {
    background-color: #222;
}

.authorbox .socialbuttons_link svg {
    width: 1.5em;
}

@media(max-width:500px){
    .authorbox {
        grid-template-columns:1fr;
    }
    .authorbox_avatar img {
    	width:var(--box-avatar-size);
    }
}

/* Social Buttons */
/* The HTML <nav class="socialbuttons"> <a href="#1" class="socialbuttons_link socialbuttons_facebook"> <svg alt="name of icon"> <path fill="#000"></path> </svg> </a> </nav> */

.socialbuttons {
  display: flex;
  flex-wrap: wrap;
  gap: 0.25rem;
}

.socialbuttons_link {
  width: 2em;
  height: 2em;
  font-size: 1.2em;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  transition: .3s;
  align-self: flex-start;
  background-color: #ccc;
}

.socialbuttons_link .ncicon {
  color: #fff;
}

.socialbuttons_facebook {
  background-color: var(--facebook);
}

.socialbuttons_twitter {
  background-color:  var(--twitter);
}

.socialbuttons_linkedin {
  background-color:  var(--linkedin);
}

.socialbuttons_pinterest {
  background-color:  var(--pinterest);
}

.socialbuttons_youtube {
  background-color:  var(--youtube);
}

.socialbuttons_instagram {
  background-color:  var(--instagram);
}

.socialbuttons_personal {
  background-color: #9b6954;
}

.socialbuttons_email {
  background-color: #999;
}

.socialbuttons_wikipedia {
  background-color: #333;
}

.socialbuttons_vimeo {
  background-color:  var(--vimeo);
}

.socialbuttons_tumblr {
  background-color:  var(--tumblr);
}


</style>