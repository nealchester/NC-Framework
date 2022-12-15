<?php function nc_taxonomy_name(){
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    return $term->taxonomy;
}