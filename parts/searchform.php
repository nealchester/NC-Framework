<form class="ncsearchform" role="search" method="get" action="<?php echo home_url(); ?>/">
	<div class="ncsearchform_contain">
		<label for="wp-searchbox" class="hidetext"><?php _e('Search','nc-framework');?></label>
		<input class="ncsearchform_input" type="search" id="wp-searchbox" name="s" <?php if(is_search()){ echo 'placeholder="'.__('Search again','nc-framework').'"'; } else { echo 'placeholder="'.__('Search','nc-framework').'"'; } ?>>
		<button class="ncsearchform_button" type="submit">
        <span class="ncsearchform_icon ncicon nc-search"></span>
		</button>
	</div>  
</form>

<?php 
    wp_enqueue_style('nc-blocks-search-box');
    /* Located in blocks/css/search.css */
?>