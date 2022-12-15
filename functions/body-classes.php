<?php

function nc_add_body_classes($classes){
    if (get_theme_mod('enhance_radio_checkboxes', true) == true) {
        $classes[] = 'formstyles';
    }
    if( is_singular() && !is_home() && !is_front_page() ) {
        $category = get_the_category(); 
        $newcat = 'category-'.strtolower(@$category[0]->slug);
        $classes[] = $newcat;
    } else { }
    return $classes;
}
add_filter('body_class', 'nc_add_body_classes');