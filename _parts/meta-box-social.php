<?php
// vars
$website    = get_the_author_meta('user_url');
$facebook   = get_the_author_meta('facebook');
$twitter    = get_the_author_meta('twitter');
$linkedin   = get_the_author_meta('linkedin');
$pinterest  = get_the_author_meta('pinterest');
$instagram  = get_the_author_meta('instagram');
$youtube    = get_the_author_meta('youtube');
// $vimeo      = get_the_author_meta('vimeo');
// $wikipedia  = get_the_author_meta('wikipedia');
// $tumblr     = get_the_author_meta('tumblr');

if ($website || $facebook || $twitter || $linkedin || $pinterest || $instagram || $youtube 
/* || $vimeo || $tumblr || $wikipedia */):
?>

<nav class="socialbuttons">

	<?php if($website):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($website) ?>" class="socialbuttons_link brand-link">
		<span class="ncicon nc-user"></span>
	</a>
	<?php endif;?>

	<?php if($facebook):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($facebook) ?>" class="socialbuttons_link brand-facebook">
	<span class="ncicon nc-facebook"></span>
	</a>
	<?php endif;?>

	<?php if($twitter):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($twitter) ?>" class="socialbuttons_link brand-twitter">
	<span class="ncicon nc-twitter"></span>
	</a>
	<?php endif;?>

	<?php if($linkedin):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($linkedin) ?>" class="socialbuttons_link brand-linkedin">
	<span class="ncicon nc-linkedin"></span>
	</a>
	<?php endif;?>

	<?php if($pinterest):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($pinterest) ?>" class="socialbuttons_link brand-pinterest">
	<span class="ncicon nc-pinterest"></span>
	</a>
	<?php endif;?>

	<?php if($instagram):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($instagram)?>" class="socialbuttons_link brand-instagram">
	<span class="ncicon nc-instagram"></span>
	</a>
	<?php endif;?>

	<?php if($youtube):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($youtube) ?>" class="socialbuttons_link brand-youtube">
	<span class="ncicon nc-youtube"></span>
	</a>
	<?php endif;?>
	
	<?php /* if($vimeo):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($vimeo) ?>" class="socialbuttons_link brand-vimeo">
	<span class="ncicon nc-vimeo"></span>
	</a>
	<?php endif;?>

	<?php if($wikipedia):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($wikipedia) ?>" class="socialbuttons_link brand-wikipedia">
	<span class="ncicon nc-wikipedia"></span>
	</a>
	<?php endif;?>

	<?php if($tumblr):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($tumblr) ?>" class="socialbuttons_link brand-tumblr">
	<span class="ncicon nc-tumblr"></span>
	</a>
	<?php endif; */ ?>

</nav>

<?php endif;?>