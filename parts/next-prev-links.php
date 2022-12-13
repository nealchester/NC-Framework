<?php 
$linktitle = __('Article','nc-framework'); 
if( !is_attachment() && get_theme_mod( 'show_nav_links', false ) == true && is_single() ): ?>

<nav class="nplinks">
	<?php $a_prev_post = get_previous_post(); if (!empty( $a_prev_post )): ?>
	<a class="nplinks_prev" href="<?php echo get_permalink( $a_prev_post->ID ); ?>" rel="prev">
		<div class="nplinks_prevwrapper">
			<div class="nplinks_text">
				<b>Prev <?php echo $linktitle; ?></b> 
				<span class="nplinks_prevtitle"><?php echo $a_prev_post->post_title; ?></span>
			</div>
		</div>
	</a>
	<?php endif; ?>

	<?php $a_next_post = get_next_post(); if (!empty( $a_next_post )): ?>
	<a class="nplinks_next" href="<?php echo get_permalink( $a_next_post->ID ); ?>" rel="next">
		<div class="nplinks_nextwrapper">
			<div class="nplinks_text">
				<b>Next <?php echo $linktitle; ?></b> 
				<span class="nplinks_nexttitle"><?php echo $a_next_post->post_title; ?></span>
			</div>
		</div>
	</a>
	<?php endif; ?>
</nav>

<?php else: endif;?>

<style>

/* Next Previous Links */

.nplinks {
    --carrat-color: #000;
    --carrat-width: 4em;
    --divider-color: #ddd;
    --divider-width: 0;
    --top-border: solid 1px #ddd;
    --nptextcolor: #000;
    --nptextcolor-hover: #000;
    --npbgcolor: #fff;
    --npbgcolor-hover: lightyellow;
  }

	.nplinks {
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  grid-gap: var(--divider-width);
  background: var(--divider-color);
  border-top:var(--top-border);
  margin: 0;
}

.nplinks a {
  display: flex;
  padding:3em 0;
  font-weight: normal;
  background:var(--npbgcolor);
  transition: 0.5s;
  align-items:center;
  position:relative;
  color: var(--nptextcolor)
}

.nplinks_prev {
  justify-content: flex-end;
}

.nplinks_next {
  justify-content: flex-start;
}

.nplinks_next .nplinks_text { 
  text-align:right; 
}

.nplinks a:hover {
  color: var(--nptextcolor-hover);
  box-shadow:inset 0 -10em 0 var(--npbgcolor-hover);
}

.nplinks_text {
  display: block;
  overflow:hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.nplinks_prevwrapper .nplinks_text {
  padding-right:var(--gap);
}

.nplinks_nextwrapper .nplinks_text {
  padding-left:var(--gap);
}

.nplinks_prevwrapper,
.nplinks_nextwrapper{
  position:relative;
  width: calc(100% - var(--gap));
  max-width: calc( var(--width-max) / 2);
}

.nplinks_prevwrapper {
  padding-left:var(--carrat-width);
}

.nplinks_nextwrapper {
  padding-right:var(--carrat-width);
}

.nplinks a:only-child .nplinks_prevwrapper,
.nplinks a:only-child .nplinks_nextwrapper {
  max-width:var(--width-max);
  width:calc(100% - (var(--gap) * 2));
  margin: 0 auto;
}

.nplinks_prevwrapper:before,
.nplinks_nextwrapper:after {
  font-size: 2.7em;
  line-height: 0;
  position: absolute;
  top: 0.5em;
  color: var(--carrat-color);
  width: var(--carrat-width);
  display: block;
  font-weight: normal;
  transition: 0.3s;
  font-family: 'ncicons';
}

.nplinks_prevwrapper:before {
  content:'\e901';
  left:0;
}

.nplinks_nextwrapper:after {
  content:'\e902';
  text-align: right;
  right: 0;
}


.nplinks_prev:hover .nplinks_prevwrapper:before {
  color:currentColor
}

.nplinks_next:hover .nplinks_nextwrapper:after {
  color:currentColor
}

.nplinks b {
  display: block;
  text-transform: uppercase;
  font-size: 0.6em;
  font-weight: bold;
}

@media(max-width:640px){
  .nplinks { grid-template-columns:1fr; }

  .nplinks_prevwrapper:before,
  .nplinks_nextwrapper:after {
      display: none;
      content:none;
  }

  .nplinks_text,
  .nplinks_prevwrapper,
  .nplinks_nextwrapper {
      padding-left:0 !important;
      padding-right:0 !important;
  }

  .nplinks_prev { justify-content:flex-start; }
  .nplinks_next .nplinks_text { text-align:left; }

  .nplinks_text {
      display: block;
      overflow: visible;
      white-space: normal;
  }

  .nplinks_hr + .ncontain { width:100%; max-width:100% }
  .nplinks a { padding:var(--gap) }
  .nplinks a:only-child { padding: var(--gap) 0; }
  .nplinks_prev { order:2 }
  
}
</style>