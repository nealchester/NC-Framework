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
function nc_sanitize_radio($input)
{
 $valid = array(
  'header-left' => __('Left Header w/ nav & widget (fixed)','nc-framework'),
  'header-right' => __('Right Header w/ nav & widget (fixed)','nc-framework'),
  'content-single' => __('Content, no sidebars','nc-framework'),
  'content-left' => __('Content left, right sidebar','nc-framework'),
  'content-right' => __('Content right, left sidebar','nc-framework'),
  '0' => __('No Mega footer','nc-framework'),
  '1' => __('Single column','nc-framework'),
  '2' => __('Two columns','nc-framework'),
  '3' => __('Three columns','nc-framework'),
  '4' => __('Four columns','nc-framework'),
  '5' => __('Five columns','nc-framework'),
  'footer-gaps' => __('Gaps','nc-framework'),
  'footer-borders' => __('Borders','nc-framework'),
  'ncolumns-fixed' => __('Fixed','nc-framework'),
  'ncolumns-auto' => __('Auto','nc-framework'),
  'ncolumns-flow' => __('Flow','nc-framework'),
  'no-body-contain' => __('No containing','nc-framework'),
  'body-contain' => __('Contain content and sidebar','nc-framework'),
  'no-side-header' => __('No Side Header','nc-framework'),
  'header-left' => __('Left Header','nc-framework'),
  'header-right' => __('Right Header','nc-framework'),
  'plain-text' => __('Plain Text','nc-framework'),
  'hero-text' => __('Hero','nc-framework'),
  'split-text' => __('Split Screen','nc-framework'),
 );
 if (array_key_exists($input, $valid)) {
  return $input;
 } else {
  return '';
 }
}
?>