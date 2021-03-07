<?php

// Customizer addons (Folder)
get_template_part('customizer/_controls');

// Load Gutenberg (Folder)
get_template_part('blocks/setup');

// Components
get_template_part('components/nc_hero_component');


// ----------------------------------------------------------- //


// Image Focus Function
get_template_part('functions/image-focus');


// Check if site has an favicon uploaded
get_template_part('functions/favicon-check');

// Load Scripts and Styles
get_template_part('functions/load-scripts-styles');


// There are no search results found
get_template_part('functions/no-results');


// Initialize Scroll Animation Sal
get_template_part('functions/init-sal');


// ACF Theme fields
get_template_part('functions/theme-acf-fields');


// Register Widget Areas
get_template_part('functions/widgets');


// New User fields
get_template_part('functions/new-user-fields');


// Default Link for empty Nav Menu
function link_to_menu_editor(){
	get_template_part( 'functions/link-to-editor' );
}

// Display the Date as Time ago
function nc_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' ago';
}

// Current Page
get_template_part('functions/current-page');


// Body Class Additions
get_template_part('functions/body-classes');


// Add theme support for various things
get_template_part('functions/add-theme-support');


// Add theme custom colors and font sizes
get_template_part('functions/editor-styles');


// Taxonomy Name
get_template_part('functions/taxonomy-name');


// Register Nav Menus
get_template_part('functions/register-nav-menus');


// Modify author archive post number to all
get_template_part('functions/author-article-amount');


// Formatted Date
get_template_part('functions/formatted-date');


// Post Meta Featured
get_template_part('functions/post_meta_featured');


// Post Meta Latest
get_template_part('functions/post_meta_latest');


/* Add the following:
	- Descriptions to menu items
	- Excerpts to Pages
	- Span class around taxonomy count numbers
	- Max content width
	- Next Page button to editor
*/
get_template_part('functions/additions');


/* Remove the following:
	- Recent comment weird output
	- The gallery styles
*/
get_template_part('functions/removals');

?>