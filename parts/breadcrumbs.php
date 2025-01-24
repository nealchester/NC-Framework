<?php if ( function_exists('yoast_breadcrumb') && is_singular() && !is_attachment() ):?>
  
<?php yoast_breadcrumb('<nav id="breadcrumbs" class="yoast-breadcrumbs">','</nav>');?>

<style>

  /* Yoast breadcrumbs */

.yoast-breadcrumbs {
    font-size: var(--txt-small);
    margin-bottom: 0.75em;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;

    a {
        color: inherit;
        font-weight: inherit;
    }

    .seper {
        font-size: 1.5ex;
        margin-inline: 0.5em;
    }

    .breadcrumb_last { 
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        border: 0;
        clip: rect(0 0 0 0);
        overflow: hidden;
    }
}

</style>


<?php elseif( is_archive() || is_post_type_archive() || is_home() || is_search() ):?>



<?php endif; ?>