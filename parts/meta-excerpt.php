<?php if(has_excerpt()):?>
    
<div class="excerpt-summary">
    <?php the_excerpt();?>
</div>

<style>
/* Excerpt */
.excerpt-summary {
    font-size:var(--txt-large);
    line-height: 1.3
}
</style>

<?php endif; ?>