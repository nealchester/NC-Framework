<?php
function nc_widget_areas()
{ 
  //Footer Widgets 

  register_sidebar(array(
    'name' => __('Footer 1','nc-framework'),
    'id' => 'footer1',
    'description' => __('This is the widgetized footer column 1.','nc-framework'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => __('Footer 2','nc-framework'),
    'id' => 'footer2',
    'description' => __('This is the widgetized footer column 2.','nc-framework'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => __('Footer 3','nc-framework'),
    'id' => 'footer3',
    'description' => __('This is the widgetized footer column 3.','nc-framework'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => __('Footer 4','nc-framework'),
    'id' => 'footer4',
    'description' => __('This is the widgetized footer column 4.','nc-framework'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  ));
  register_sidebar(array(
    'name' => __('Footer 5','nc-framework'),
    'id' => 'footer5',
    'description' => __('This is the widgetized footer column5.','nc-framework'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<header class="widget_header">',
    'after_title' => '</header>'
  )); 

//Sidebar Widget

register_sidebar(array(
  'name' => __('Sidebar','nc-framework'),
  'id' => 'sidebar',
  'description' => __('This is the widgetized right sidebar.','nc-framework'),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<header class="widget_header">',
  'after_title' => '</header>'
));


// Mobile Menu widget

register_sidebar(array(
  'name' => __('Mobile Panel','nc-framework'),
  'id' => 'mobilepanel',
  'description' => __('This is the widgetized area for the Mobile Menu. Adding widgets here will replace the default mobile menu items.','nc-framework'),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<header class="widget_header">',
  'after_title' => '</header>'
));  

}
add_action('widgets_init', 'nc_widget_areas');
?>