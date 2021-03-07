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
  'header-left' => 'Left Header w/ nav & widget (fixed)',
  'header-right' => 'Right Header w/ nav & widget (fixed)',
  'content-single' => 'Content, no sidebars',
  'content-left' => 'Content left, right sidebar',
  'content-right' => 'Content right, left sidebar',
  '0' => 'No Mega footer',
  '1' => 'Single column',
  '2' => 'Two columns',
  '3' => 'Three columns',
  '4' => 'Four columns',
  '5' => 'Five columns',
  'footer-gaps' => 'Gaps',
  'footer-borders' => 'Borders',
  'ncolumns-fixed' => 'Fixed',
  'ncolumns-auto' => 'Auto',
  'ncolumns-flow' => 'Flow',
  'no-body-contain' => 'No containing',
  'body-contain' => 'Contain content and sidebar',
  'no-side-header' => 'No Side Header',
  'header-left' => 'Left Header',
  'header-right' => 'Right Header',
  'plain-text' => 'Plain Text',
  'hero-text' => 'Hero',
  'split-text' => 'Split Screen'
 );
 if (array_key_exists($input, $valid)) {
  return $input;
 } else {
  return '';
 }
}
?>