<?php 

/* Set the Heading Text */
$heading = __('Related Pages','nc-framework');

/* If the page has siblings show them, if not, show the parent's siblings */
if ($post->post_parent) {
    $children = wp_list_pages("sort_column=menu_order&title_li=&depth=3&child_of=".$post->post_parent."&echo=0");
}
else { 
  $children = wp_list_pages("sort_column=menu_order&title_li=&depth=3&child_of=".$post->ID."&echo=0");
}

if( get_theme_mod('show_related_pages', false) == true && is_page() && $children ): ?>
<section class="ncrelatedpages">
  <div class="ncrelatedpages_container">
    <hr class="ncrelatedpages_hr">
    <header class="ncrelatedpages_header"><?php echo $heading; ?></header>
    <ul class="ncrelatedpages_list">
      <?php echo $children; ?>
    </ul>
  </div>
</section>
<?php endif; ?>