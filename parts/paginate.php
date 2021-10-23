<?php
/* 
1. Copy this code in place of the get_template_part for custom queries using WP_Query.
2. Remove the first line "global $wp_query."
3. Change the last line from "$wp_query->max_num_pages" to $your_custom_query_name->max_num_pages.
*/

global $wp_query;
$big = 999999999; // need an unlikely integer
echo '<nav class="pagination">';
echo paginate_links( array(
  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
  'format' => '?paged=%#%',
  'prev_text' => '<span class="pagination_prev"></span>',
  'next_text' => '<span class="pagination_next"></span>',
  'end_size' => 2,
  'mid_size' => 0,
  'current' => max(1, get_query_var('paged')),
  'total' => $wp_query->max_num_pages 
));
echo '</nav>';
?>