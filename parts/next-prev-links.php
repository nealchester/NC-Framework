<?php 
$linktitle = 'Article'; 
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