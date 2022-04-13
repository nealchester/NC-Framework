<?php if ( function_exists('yoast_breadcrumb') && is_singular() && !is_attachment() ):?>
  
<p class="yoast-breadcrumbs"><?php yoast_breadcrumb();?></p>

<style>

  /* Yoast breadcrumbs */

.yoast-breadcrumbs {
    font-size: var(--txt-small);
    margin-bottom: 0.75em;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}

.yoast-breadcrumbs a {
    color: inherit;
}

.yoast-breadcrumbs .breadcrumb_last { 
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    border: 0;
    clip: rect(0 0 0 0);
    overflow: hidden;
}

</style>


<?php elseif( is_archive() || is_post_type_archive() || is_home() || is_search() ):?>



<?php endif; ?>