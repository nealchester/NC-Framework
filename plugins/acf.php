<?php 

/* Fix UI styling in the block editor */

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
      .acf-field.acf-field-textarea[data-name="add_to_block"] textarea,
      .acf-field.acf-field-text[data-name="set_id"] input {
        background: #eee;
        font-family: 'Courier New', Courier, monospace;
        line-height: 1.2;
      }

      /* Remove the scroll bar from Tabs sections */
      .acf-tab-wrap {
        overflow: visible; /* I used to be "auto" */
      }

      .acf-block-panel .acf-block-fields .acf-tab-wrap {
        background: #f9f9f9;
      }



      .acf-input-wrap :is(input, textarea)::-webkit-input-placeholder {
      /* Chrome/Opera/Safari */
      color: var(--placeholder-color, inherit);
      font-style: var(--placeholder-font-style, normal);
      opacity: var(--placeholder-opacity, 0.5);
      }

      .acf-input-wrap :is(input, textarea)::-moz-placeholder {
      /* Firefox 19+ */
      color: var(--placeholder-color, inherit);
      font-style: var(--placeholder-font-style, normal);
      opacity: var(--placeholder-opacity, 0.5);
      }

      .acf-input-wrap :is(input, textarea):-ms-input-placeholder {
      /* IE 10+ */
      color: var(--placeholder-color, inherit);
      font-style: var(--placeholder-font-style, normal);
      opacity: var(--placeholder-opacity, 0.5);
      }

      .acf-input-wrap :is(input, textarea):-moz-placeholder {
      /* Firefox 18- */
      color: var(--placeholder-color, inherit);
      font-style: var(--placeholder-font-style, normal);
      opacity: var(--placeholder-opacity, 0.5);
      }
      

      /* Editor Sidebar */
      #editor .postbox>.postbox-header .hndle,
      .edit-post-meta-boxes-area #poststuff h2.hndle{
      padding: 0 0 0 16px;
      font-weight: 500;
      font-size: 13px;
      line-height: 1.4;
      }

      .mce-container-body.mce-stack-layout {
        max-width: 768px;
        margin-inline: auto;
      }

      div.mce-fullscreen {
        background: rgba(0, 0, 0, 0.7);
        padding-block: 1em;
      }

      .wp-picker-holder {
        margin-left: -12px;
      }

    </style>
    
<?php }

add_action('acf/input/admin_head', 'my_acf_admin_head');