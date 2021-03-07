<?php
// vars
$website    = get_the_author_meta('user_url');
$facebook   = get_the_author_meta('facebook');
$twitter    = get_the_author_meta('twitter');
$linkedin   = get_the_author_meta('linkedin');
$pinterest  = get_the_author_meta('pinterest');
$instagram  = get_the_author_meta('instagram');
$youtube    = get_the_author_meta('youtube');
$vimeo      = get_the_author_meta('vimeo');
$tumblr     = get_the_author_meta('tumblr');

if ($website || $facebook || $twitter || $linkedin || $pinterest || $instagram || $youtube || $vimeo || $tumblr):
?>

<nav class="socialbuttons">

	<?php if($website):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($website) ?>" class="socialbuttons_link socialbuttons_personal">
	<?php get_template_part('img/social/personal.svg');?>
	</a>
	<?php endif;?>
	<?php if($facebook):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($facebook) ?>" class="socialbuttons_link socialbuttons_facebook">
	<?php get_template_part('img/social/facebook.svg');?>
	</a>
	<?php endif;?>
	<?php if($twitter):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($twitter) ?>" class="socialbuttons_link socialbuttons_twitter">
	<?php get_template_part('img/social/twitter.svg');?>
	</a>
	<?php endif;?>
	<?php if($linkedin):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($linkedin) ?>" class="socialbuttons_link socialbuttons_linkedin">
	<?php get_template_part('img/social/linkedin.svg');?>
	</a>
	<?php endif;?>
	<?php if($pinterest):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($pinterest) ?>" class="socialbuttons_link socialbuttons_pinterest">
	<?php get_template_part('img/social/pinterest.svg');?>
	</a>
	<?php endif;?>
	<?php if($instagram):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($instagram)?>" class="socialbuttons_link socialbuttons_instagram">
	<?php get_template_part('img/social/instagram.svg');?>
	</a>
	<?php endif;?>
	<?php if($youtube):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($youtube) ?>" class="socialbuttons_link socialbuttons_youtube">
	<?php get_template_part('img/social/youtube.svg');?>
	</a>
	<?php endif;?>
	<?php if($vimeo):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($youtube) ?>" class="socialbuttons_link socialbuttons_vimeo">
	<?php get_template_part('img/social/vimeo.svg');?>
	</a>
	<?php endif;?>
	<?php if($tumblr):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($tumblr) ?>" class="socialbuttons_link socialbuttons_tumblr">
	<?php get_template_part('img/social/tumblr.svg');?>
	</a>
	<?php endif;?>
</nav>
<?php endif;?>