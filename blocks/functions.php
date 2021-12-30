<?php

// Custom Block Styles
function nc_block_custom_css(){
    if(get_field('custom_styles')){
        echo "/* Custom CSS */ \r\n \r\n".get_field('custom_styles');
    }
}

// Scroll Animation Function
function sal_animate(){
    
    $sal_effect = get_field('sal_effect');
    $sal_instant = get_field('sal_instant');

    if( $sal_effect && $sal_instant ) { 
        return '';
    } 
    elseif( $sal_effect ) { 
        return 'data-av-animation="'.$sal_effect.'"';
    }
    else { 
        return ''; 
    }
}

// Scroll Animation CSS
function sal_classes(){

    $sal_duration = get_field('sal_duration');
    $sal_delay = get_field('sal_delay');
    $sal_effect = get_field('sal_effect');
    $sal_instant = get_field('sal_instant');

    if( $sal_effect && $sal_instant ) { 
        return ' animated '.$sal_effect.' '.$sal_duration.' '.$sal_delay;
    } 
    elseif( $sal_effect ) { 
        return ' aniview '.$sal_duration.' '.$sal_delay;
    } 
}

// Block Attributes
function nc_block_attr(){
    if(get_field('add_to_block')) {
        return ' '.get_field('add_to_block');
    }
}

// Container Attributes
function nc_contain_attr(){
    if(get_field('add_to_container')) {
        return ' '.get_field('add_to_container');
    }
}

// Container Classes
function nc_contain_classes(){
    if(get_field('add_contain_classes')) {
        return ' '.get_field('add_contain_classes');
    }
}

// Before Content
function nc_before_content(){
    if(get_field('content_before')) {
        echo '<div class="nc_content_block_before">'.get_field('content_before').'</div>';
    }
}

// After Content
function nc_after_content(){
    if(get_field('content_after')) {
        echo '<div class="nc_content_block_after">'.get_field('content_after').'</div>';
    }
}

// Box Settings
function nc_box_styles( $block_id =''){
    $padding = get_field('padding') ?: '3rem 0';

    if( get_field('bg_color') ) { $bg_color = 'background-color:'.get_field('bg_color').';'; } else { $bg_color = null; }
    if( get_field('bg_image') ) { $bg_img = 'background-image:url('.get_field('bg_image').'); background-repeat: no-repeat; background-size: cover;'; } else { $bg_img = null; }
    if( get_field('text_color') ) { $text_color = 'color:'.get_field('text_color').';'; } else { $text_color = null; }

    if( get_field('max_contain_width') ) {
        $c_width = get_field('max_contain_width').'px';     
    }
    elseif( get_field('max_contain_width_set') ) {
        $c_width = get_field('max_contain_width_set');
    }
    else {
        $c_width = 'var(--width-wide)';
    }

    $m_width = get_field('main_content_width') ?: '600px';

    if( get_field('box_direction') == 'column' ) {
        $direction = "display: flex; \r\n
        flex-direction:row; \r\n
        align-items:flex-start; \r\n
        gap: 2em;"; 
    }

    $order = get_field('main_content_order') ?: '2';

    $breakpoint = get_field('minimum_width') ?: '960';

    // box
    echo "#".$block_id." {";
    echo $bg_color;
    echo $bg_img;
    echo "padding: ".$padding.";";
    echo $text_color;
    echo "}";

    echo "#".$block_id." .ncontain {";
    echo "max-width: ".$c_width.";";
    echo "}";

    if ( get_field('box_direction') == 'column' ) {

    echo "
    @media (min-width:".$breakpoint."px) {

        #".$block_id." .ncontain {
        ".$direction.   
        "}

        #".$block_id." .ncontain > .nc_content_block_main {
        order: ".$order.";
        width: ".$m_width.";
        max-width: ".$m_width.";
        min-width: ".$m_width.";
        }

        #".$block_id." .nc_content_block_before,
        #".$block_id." .nc_content_block_after {
        flex-grow:1;
        }    

    }";

    }

}

// Block Posts Meta
function nc_block_posts_meta(){

    // WordPress functions

    $pm_title = get_the_title();
    $pm_date = get_the_time(get_option('date_format'));
    $pm_author = get_the_author_meta('display_name');
    $pm_comments = get_comments_number();
    $pm_avatar = get_avatar( get_the_author_meta('user_email'), $size = '50'); 
    $pm_category = get_the_category();


    // ACF
    if(function_exists('get_field')) {
        $pm = get_field('block_post_meta');
        $truncate = get_field('tuncate_char_limit') ?: '100';
    }

    // date, author, avatar, comments, category, listen, read

    if( $pm && in_array('title', $pm) ){ echo '<span class="ncard_title">'.$pm_title.'</span>'; }
    if( $pm && in_array('date', $pm) ){ echo '<span class="ncard_date">'.$pm_date.'</span>'; }
    if( $pm && in_array('author', $pm) ){ echo '<span class="ncard_author">'.$pm_author.'</span>'; }
    if( $pm && in_array('avatar', $pm) ){ echo '<span class="ncard_avatar">'.$pm_avatar.'</span>'; }
    if( $pm && in_array('comments', $pm) ){ echo '<span class="ncard_comments">'.$pm_comments.' Comments</span>'; }
    if( $pm && in_array('category', $pm) ){ echo '<span class="ncard_category">'.$pm_category[0]->cat_name.'</span>'; }


    if( $pm && in_array('excerpt', $pm) && get_the_excerpt(get_the_ID()) ) { 
        echo '<div class="ncard_desc">'.substr( get_the_excerpt( get_the_ID() ), 0, $truncate ).'<span class="ncard_ell">&hellip;</span> <span class="ncard_rmore">Read more</span></div>';        
    }

}



?>