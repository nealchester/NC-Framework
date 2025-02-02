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
    echo '<p class="ncurrentpage txt-small"> <span class="ncurrentpage_label">'.__('You\'re on page', 'ul-countries').'</span> <span class="ncurrentpage_number">'.$page. '</span> <span class="ncurrentpage_of">'.__('of','ul-countries').'</span> <span class="ncurrentpage_total">'.$pages.'</span></p>';
}