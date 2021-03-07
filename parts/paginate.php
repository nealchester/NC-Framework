<?php
if (paginate_links()):
?>
<nav class="pagination">
    <?php
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  echo paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'prev_text' => '<span class="pagination_prev"></span>',
    'next_text' => '<span class="pagination_next"></span>',
    'end_size' => 2,
    'mid_size' => 0,
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
  ));
?>
</nav>
<?php
endif;
?>