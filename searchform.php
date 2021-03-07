<form class="ncsearchform" role="search" method="get" action="<?php echo home_url(); ?>/">
	<div class="ncsearchform_contain">
		<label for="wp-searchbox" class="hidetext">Search</label>
		<input class="ncsearchform_input" type="search" id="wp-searchbox" name="s" <?php if(is_search()){ echo 'placeholder="Search again"'; } else { echo 'placeholder="Search"'; } ?>>
		<button class="ncsearchform_button" type="submit">
			<svg class="ncsearchform_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><g transform="translate(0 -13.5)"><g transform="translate(0 13.5)"><path d="M20.149,31.771,30,41.622,28.122,43.5l-9.851-9.851a11.284,11.284,0,1,1,1.878-1.878Zm-8.863,1.644a8.63,8.63,0,1,0-8.63-8.63A8.63,8.63,0,0,0,11.285,33.415Z" transform="translate(0 -13.5)"/></g></g></svg>
		</button>
	</div>  
</form>