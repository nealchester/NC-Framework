<?php

// Add custom classes to the button

add_filter( 'gform_submit_button', 'add_custom_css_classes', 10, 2 );
function add_custom_css_classes( $button, $form ) {
    $fragment = WP_HTML_Processor::create_fragment( $button );
    $fragment->next_token();
    $fragment->add_class( 'btn' );
    $fragment->add_class( 'gform_btn' );
 
    return $fragment->get_updated_html();
}

/**
* Filters the next, previous and submit buttons.
* Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
*
* @param string $button Contains the <input> tag to be filtered.
* @param array  $form    Contains all the properties of the current form.
*
* @return string The filtered button.
*/
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $fragment = WP_HTML_Processor::create_fragment( $button );
    $fragment->next_token();
 
    $attributes = array( 'id', 'type', 'class', 'onclick' );
    $new_attributes = array();
    foreach ( $attributes as $attribute ) {
        $value = $fragment->get_attribute( $attribute );
        if ( ! empty( $value ) ) {
            $new_attributes[] = sprintf( '%s="%s"', $attribute, esc_attr( $value ) );
        }
    }
 
    return sprintf( '<button %s>%s</button>', implode( ' ', $new_attributes ), esc_html( $fragment->get_attribute( 'value' ) ) );
}

//

add_filter( 'gform_submit_button', 'gf_change_submit_button_text', 10, 2 );
function gf_change_submit_button_text( $button, $form ) {
    $fragment = WP_HTML_Processor::create_fragment( $button );
    $fragment->next_token();
    $onclick = trim( (string) $fragment->get_attribute( 'onclick' ) );
    if ( ! empty( $onclick ) && substr( $onclick, - 1 ) !== ';' ) {
        $onclick .= ';';
    }
    $onclick .= " this.value='Sending...';";
    $fragment->set_attribute( 'onclick', $onclick );
 
    return $fragment->get_updated_html();
}