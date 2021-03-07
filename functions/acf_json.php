<?php

add_filter('acf/settings/load_json', 'archi_acf_json_load_point');
function archi_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}

?>