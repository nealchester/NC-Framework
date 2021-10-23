<div class="published"> 
	<b class="published_label">
	<?php get_template_part('img/calendar-icon.svg');?>
	<span class="hidetext"><?php _e('Published','nc-framework');?></span></b> 
	<span class="published_dates"> <span itemprop="datePublished">
	<?php the_time(get_option('date_format')); ?>
	</span> updated on <span itemprop="dateModified">
	<?php the_modified_date(); ?>
	</span>. </span> 
</div>