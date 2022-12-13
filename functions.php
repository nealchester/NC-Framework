<?php

// Customizer addons (Folder)
get_template_part('customizer/_controls');

// Load Gutenberg (Folder)
get_template_part('blocks/block-setup');


// ----------------------------------------------------------- //


// Image Focus Function
get_template_part('functions/image-focus');


// Check if site has an favicon uploaded
get_template_part('functions/favicon-check');


// Category Link
get_template_part('functions/category-link');


// Load External Fonts
get_template_part('functions/register-fonts');


// Load Scripts and Styles
get_template_part('functions/register-css-js');


// There are no search results found
get_template_part('functions/no-results');


// ACF Theme fields
get_template_part('functions/theme-acf-fields');


// ACF JSON Link
get_template_part('functions/acf-json');


// Register Widget Areas
get_template_part('functions/register-widgets');


// New User fields
get_template_part('functions/new-user-fields');


// Default Link for empty Nav Menu
get_template_part('functions/link-to-editor');


// Display the Date as Time ago
get_template_part('functions/time-ago-function');


// Current Page
get_template_part('functions/current-page');


// Body Class Additions
get_template_part('functions/body-classes');


// Add theme support for various things
get_template_part('functions/add-theme-support');


// Taxonomy Name
get_template_part('functions/taxonomy-name');


// Register Nav Menus
get_template_part('functions/register-menus');


// Modify author archive post number to all
get_template_part('functions/author-article-amount');


// Formatted Date
get_template_part('functions/formatted-date');


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