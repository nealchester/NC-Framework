<?php

function nc_modify_num_posts($query)
{
    if ($query->is_main_query() && $query->is_author() && !is_admin())
        $query->set('posts_per_page', -1);
}
add_action('pre_get_posts', 'nc_modify_num_posts');

?>