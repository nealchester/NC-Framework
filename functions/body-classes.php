<?php

add_filter('body_class', 'nc_add_body_classes');
function nc_add_body_classes($classes)
{
    if (get_theme_mod('enhance_radio_checkboxes', true) == true) {
        $classes[] = 'formstyles';
    }
    return $classes;
}

?>