<?php function category_link(){
 
  $category = get_the_category(); 
  if ( ! empty( $category ) ) {
    echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
  }

}