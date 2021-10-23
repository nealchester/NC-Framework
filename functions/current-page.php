<?php
// Current Page Function for Archives

function nc_current_page( $var = '' ) {
    if( empty( $var ) ) {
        global $wp_query;
        if( !isset( $wp_query->max_num_pages ) )
            return;
        $pages = $wp_query->max_num_pages;
    }

    else {
        global $$var;
            if( !is_a( $$var, 'WP_Query' ) )
                return;
        if( !isset( $$var->max_num_pages ) || !isset( $$var ) )
            return;
        $pages = absint( $$var->max_num_pages );
    }

    if( $pages < 1 )
        return;
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    echo '<p class="ncurrentpage txt-small">'.__('You\'re on page', 'nc-framework').' '. $page . ' '.__('of','nc-framework').' ' . $pages.'</p>';
}