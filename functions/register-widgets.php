<?php
function nc_widget_areas()
{ 
  //Footer Widgets 

  register_sidebar(array(
    'name' => 'Footer1',
    'id' => 'footer1',
    'description' => 'This is the widgetized footer column 1.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => 'Footer2',
    'id' => 'footer2',
    'description' => 'This is the widgetized footer column 2.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => 'Footer3',
    'id' => 'footer3',
    'description' => 'This is the widgetized footer column 3.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => 'Footer4',
    'id' => 'footer4',
    'description' => 'This is the widgetized footer column 4.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => 'Footer5',
    'id' => 'footer5',
    'description' => 'This is the widgetized footer column5.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  )); 

//Sidebar Widget

register_sidebar(array(
  'name' => 'Sidebar',
  'id' => 'sidebar',
  'description' => 'This is the widgetized right sidebar.',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<header class="widget_header">',
  'after_title' => '</header>'
));


// Mobile Menu widget

register_sidebar(array(
  'name' => 'Mobile Panel',
  'id' => 'mobilepanel',
  'description' => 'This is the widgetized area for the Mobile Menu. Adding widgets here will replace the default mobile menu items.',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<header class="widget_header">',
  'after_title' => '</header>'
));  

}
add_action('widgets_init', 'nc_widget_areas');
?>