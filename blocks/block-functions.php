<?php

// Custom Block Styles
function nc_block_custom_css(){
    if(get_field('custom_styles')){
        echo "/* Custom CSS */ \r\n \r\n".get_field('custom_styles');
    }
}


// Scroll Animation Function
function nc_animate(){
    
    $sal_effect = get_field('sal_effect');
    $sal_duration = get_field('sal_duration');
    $sal_delay = get_field('sal_delay');

    if( $sal_duration ) { 
        $durat = ' data-aos-duration="'.$sal_duration.'"';
    }else { $durat = null; }

    if( $sal_delay ) { 
        $delay = ' data-aos-delay="'.$sal_delay.'"';
    }else { $delay = null; }

    if( $sal_effect ) { 
        return 'data-aos="'.$sal_effect.'"'.$durat.''.$delay.'';
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
    if( get_field('text_color') ) { $text_color = 'color:'.get_field('text_color').';'; } else { $text_color = 'color: inherit;'; }

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


// For Gallery Images
function nc_block_image_focus($image) {
    if( function_exists('get_field') && get_field("featured_image_focus", $image) ){ 
        
        $img_focus = get_field("featured_image_focus", $image);
        return 'object-position:'.$img_focus.'; transform-origin:'.$img_focus.';'; 
    }
    else {
        return 'object-position:center; transform-origin:center;';	
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

// Inner Content Block
function nc_inner_blocks(int $hlevel = 1) {
    $template = array(
        array('core/heading', array(
            'level' => $hlevel,
            'content' => 'Click to edit title',
        )),
        array( 'core/paragraph', array(
                'content' => 'Insert some text here... Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
        ))
    );
    
    return'<InnerBlocks template="'.esc_attr( wp_json_encode( $template ) ).'" />';
}

// Inner Column Block
function nc_inner_col_blocks(int $hlevel = 2) {
    $template = array(

        array('core/heading', array(
            'level' => $hlevel,
            'content' => 'Click to edit title',
        )),
        array( 'core/paragraph', array(
                'content' => 'Insert some text here... Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
        )),

        array( 'core/columns', array(), array(
            array( 'core/column', array(), array(
                array( 'core/paragraph', array(
                'content' => 'Column 1',
                )),
            )),
            array( 'core/column', array(), array(
                array( 'core/paragraph', array(
                'content' => 'Column 2',
                )),
            )),
            array( 'core/column', array(), array(
                array( 'core/paragraph', array(
                'content' => 'Column 3',
                )),
            )),
        ))     


    );
    
    return'<InnerBlocks template="'.esc_attr( wp_json_encode( $template ) ).'" />';
}

// Fallback Image
function nc_block_fallback_image() {
    if( get_theme_mod('fallback_image')) {
        echo get_theme_mod('fallback_image');
    } else {
        echo get_theme_file_uri('/blocks/img/default-image.png');
    }
}


/**
* Convert a hexa decimal color code to its RGB equivalent
*
* @param string $hexStr (hexadecimal color value)
* @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
* @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
* @return array or string (depending on second parameter. Returns False if invalid hex color value)
*/                                                                                                
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}