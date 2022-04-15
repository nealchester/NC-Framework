<?php
// Sanitizer functions for Customizer
// textbox    
function nc_sanitize_text($input)
{
 return esc_html($input);
}
// checkbox    
function nc_sanitize_checkbox($input)
{
 if ($input == 1) {
  return 1;
 } else {
  return '';
 }
}
// radio
function nc_sanitize_radio($input){
 $valid = array(
  'header-left' => __('Left Header w/ nav & widget (fixed)','nc-framework'),
 );
 if (array_key_exists($input, $valid)) {
  return $input;
 } else {
  return '';
 }
}
?>