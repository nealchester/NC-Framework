<?php 

/* Bread Crumbs Customized */

add_filter( 'wpseo_breadcrumb_separator', function( $separator ) {
  return '<span class="ncicon nc-arrow-forward seper"></span>';
} );