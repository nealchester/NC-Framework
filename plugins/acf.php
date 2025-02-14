<?php 

function my_acf_admin_head() { ?>
    <style type="text/css">

      .acf-field.acf-accordion .acf-label.acf-accordion-title {
        padding: 16px 48px 16px 16px; 
      }
      .acf-accordion .acf-accordion-title svg.acf-accordion-icon {
        right: 16px;
      }
      .acf-field.acf-field-textarea[data-name="custom_styles"] textarea,
      .acf-field.acf-field-textarea[data-name="custom_css_box"] textarea {
        background: #222;
        color: #eee;
        font-family: 'Courier New', Courier, monospace;
        line-height: 1.2;
      }
      .acf-field.acf-field-textarea[data-name="add_to_block"] textarea {
        background: #eee;
        font-family: 'Courier New', Courier, monospace;
        line-height: 1.2;
      }
      /* Remove the empty label and it's spacing */
      .acf-field.acf-field-textarea[data-name="add_to_block"] .acf-label {
        margin-bottom:0;
      }

      /* Remove the scroll bar from Tabs sections */
      .acf-tab-wrap {
        overflow: visible; /* I used to be "auto" */
      }

      .acf-block-panel .acf-block-fields .acf-tab-wrap {
        background: #f9f9f9;
      }
      

      /* Editor Sidebar */
      #editor .postbox>.postbox-header .hndle,
      .edit-post-meta-boxes-area #poststuff h2.hndle{
      padding: 0 0 0 16px;
      font-weight: 500;
      font-size: 13px;
      line-height: 1.4;
      }

      acf-label

    </style>
    
<?php }

add_action('acf/input/admin_head', 'my_acf_admin_head');