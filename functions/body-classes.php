<?php

function nc_add_body_classes($classes){
    if (get_theme_mod('enhance_radio_checkboxes', true) == true) {
        $classes[] = 'formstyles';
    }

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