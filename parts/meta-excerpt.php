<?php if(has_excerpt() && get_theme_mod('show_excerpt', false) == true):?>
<div class="excerpt-summary">
    <?php the_excerpt();?>
</div>
<?php endif; ?>