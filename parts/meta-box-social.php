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
$wikipedia  = get_the_author_meta('wikipedia');
$tumblr     = get_the_author_meta('tumblr');

if ($website || $facebook || $twitter || $linkedin || $pinterest || $instagram || $youtube || $vimeo || $tumblr || $wikipedia):
?>

<nav class="socialbuttons">

	<?php if($website):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($website) ?>" class="socialbuttons_link socialbuttons_personal">
		<span class="ncicon nc-user"></span>
	</a>
	<?php endif;?>

	<?php if($facebook):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($facebook) ?>" class="socialbuttons_link socialbuttons_facebook">
	<span class="ncicon nc-facebook"></span>
	</a>
	<?php endif;?>

	<?php if($twitter):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($twitter) ?>" class="socialbuttons_link socialbuttons_twitter">
	<span class="ncicon nc-twitter"></span>
	</a>
	<?php endif;?>

	<?php if($linkedin):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($linkedin) ?>" class="socialbuttons_link socialbuttons_linkedin">
	<span class="ncicon nc-linkedin"></span>
	</a>
	<?php endif;?>

	<?php if($pinterest):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($pinterest) ?>" class="socialbuttons_link socialbuttons_pinterest">
	<span class="ncicon nc-pinterest"></span>
	</a>
	<?php endif;?>

	<?php if($instagram):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($instagram)?>" class="socialbuttons_link socialbuttons_instagram">
	<span class="ncicon nc-instagram"></span>
	</a>
	<?php endif;?>

	<?php if($youtube):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($youtube) ?>" class="socialbuttons_link socialbuttons_youtube">
	<span class="ncicon nc-youtube"></span>
	</a>
	<?php endif;?>

	<?php if($vimeo):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($vimeo) ?>" class="socialbuttons_link socialbuttons_vimeo">
	<span class="ncicon nc-vimeo"></span>
	</a>
	<?php endif;?>

	<?php if($wikipedia):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($wikipedia) ?>" class="socialbuttons_link socialbuttons_wikipedia">
	<span class="ncicon nc-wikipedia"></span>
	</a>
	<?php endif;?>

	<?php if($tumblr):?>
	<a target="_blank" rel="noreferrer" href="<?php echo esc_url($tumblr) ?>" class="socialbuttons_link socialbuttons_tumblr">
	<span class="ncicon nc-tumblr"></span>
	</a>
	<?php endif;?>

</nav>

<?php endif;?>


<style>

/* Social Buttons */

.socialbuttons {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.socialbuttons_link {
  width: 2em;
  height: 2em;
  font-size: 0.9em;
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
  background-color: #444;
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

.socialbuttons_link:hover {
	opacity: 0.5;
}

</style>