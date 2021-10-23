<?php if( get_theme_mod( 'show_tags', false ) == true): ?>

<?php the_tags('<nav class="taxonomy taxonomy-tags">
	<div class="taxonomy_label">'.__('Tags','nc-framework').'</div>
	<div class="taxonomy_anchors">','','</div>
</nav>'); ?>

<?php else: endif;?>