<div class="published"> 
	<b class="published_label">
	<span class="ncicon nc-clock"></span>
	<span class="hidetext"><?php _e('Published','nc-framework');?></span></b> 
	<span class="published_dates"> <span itemprop="datePublished">
	<?php the_time(get_option('date_format')); ?>
	</span> updated on <span itemprop="dateModified">
	<?php the_modified_date(); ?>
	</span>. </span> 
</div>

<style>

/* Publish Date */

.published {
    margin-bottom: var(--gap);
    display: flex;
    padding-top: var(--gap);
    align-items: flex-start;
}

.published_label {
    font-weight: bold;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    margin-right: 0.5em;
}

.published_label .nc-clock {
    font-size: 1.5em;
    display:inline-block;
    color:#ddd;
}

.published_label b {
    margin-left: 0.5em;
}

</style>