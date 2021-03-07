<?php
function is_search_has_results() {
    return 0 != $GLOBALS['wp_query']->found_posts;
}

?>