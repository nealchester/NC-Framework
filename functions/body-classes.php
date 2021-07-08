<?php

add_filter('body_class', 'nc_add_body_classes');
function nc_add_body_classes($classes)
{
    if (get_theme_mod('enhance_radio_checkboxes', true) == true) {
        $classes[] = 'formstyles';
    }
    if(is_singular()) {
        $category = get_the_category();
        $classes[] = 'category-'.strtolower($category[0]->slug);
    } else { }
    return $classes;
}

?>