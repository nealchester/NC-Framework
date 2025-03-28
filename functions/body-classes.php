<?php

function nc_add_body_classes($classes){

    /* Add a class of site ID to to style site with in multisite. */
    $this_id = get_current_blog_id();
    $classes[] = 'site-id-'.$this_id;
    
    /* Add this class to style radio buttons and checkboxes in a different way. */
    if (get_theme_mod('enhance_radio_checkboxes', true) == true) {
        $classes[] = 'formstyles';
    }

    /* Add this class to style posts based on category name. */
    if ( is_singular() ) {
        $category = get_the_category(); 
        if ( ! empty( $category ) ) {
            $category_name = strtolower( $category[0]->slug ); 
            $classes[] = 'category-' . $category_name; 
        }
    }

    return $classes;
}
add_filter('body_class', 'nc_add_body_classes');