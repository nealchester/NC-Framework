<?php 

function my_acf_admin_head() { ?>
    <style type="text/css">

      .acf-field.acf-accordion .acf-label.acf-accordion-title {
        padding: 16px 48px 16px 16px; 
      }
      .acf-accordion .acf-accordion-title svg.acf-accordion-icon {
        right: 16px;
      }
      .acf-field.acf-field-textarea[data-name="custom_styles"] textarea {
        background: #222;
        color: #eee;
        font-family: 'Courier New', Courier, monospace;
        line-height: 1.2;
      }

    </style>
    
<?php }

add_action('acf/input/admin_head', 'my_acf_admin_head');