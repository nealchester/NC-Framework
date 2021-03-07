<?php if( get_theme_mod( 'show_categories', false ) == true): ?>

<nav class="taxonomy taxonomy-categories">
	<div class="taxonomy_label">Filed</div>
	<div class="taxonomy_anchors">
		<?php the_category('','',''); ?>
	</div>
</nav>

<?php else: endif;?>