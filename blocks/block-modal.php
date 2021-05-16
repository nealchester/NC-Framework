<?php

// New Block
add_action('acf/init', 'nc_modal_block');
function nc_modal_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_modal',
            'title'             => __('NC Modal Box', 'nc-framework'),
            'description'       => __('Add a modal box to this page', 'nc-framework'),
            'render_callback'   => 'nc_modal_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('modal', 'popup box' ),
			'post_types'        => array('post', 'page'),
			'align'             => 'full',
			'supports'          => array( 
									'align' => array( 'wide', 'full' ), 
									'mode' => true,
									'multiple' => false,
									),
        ));
}

/* This displays the block */

function nc_modal_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
    if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

	//ACF Block
    $main_message = get_field('message') ?: 'Lorem ipsum dolor sit amet, con sectetuer adipiscin diam wisi enim ad minim ve niam quis.';
    $link_text = get_field('link_text') ?: 'Lorem ipsum dolor sit amet';
    $link_url = get_field('link_url') ?: '#null';
?>

<div class="hpopup_overlay">
  <div class="hpopup">
    <div class="hpopup_container">
      <div class="hpopup_message"><?php echo $main_message; ?></div>
      <div class="hpopup_link">
          <a href="<?php echo esc_html($link_url); ?>" class="harrow"><?php echo $link_text; ?></a>
      </div>
    </div>
    <button class="hpopup_close">
      <?php get_template_part('img/icon-x.svg'); ?>
    </button>
  </div>
</div>

<script>
jQuery( document ).ready(function() {
  if (!sessionStorage.alreadyClicked) {
    jQuery('#wrapper .hpopup_overlay').addClass('open');

    jQuery('#wrapper .hpopup_close').click( function () {
      jQuery('#wrapper .hpopup_overlay').removeClass('open');
    });
      sessionStorage.alreadyClicked = "true";
  }
});
</script>

<style id="<?php echo $id; ?>-block-css">

/* Popup */

.hpopup { 
  background: #310540 no-repeat center;
  background-size: cover;
  padding:3rem 1.5rem; 
  display:flex; 
  align-items:center; 
  justify-content:center; 
  text-align:center;  
  color:#fff;
  width:100%;
  max-width: 700px;
  min-height: 400px;
  box-shadow: 0 3px 1em rgba(0,0,0,0.5);
  position: relative;
  margin:0 auto;
}

/* for frontend */
#wrapper .hpopup {
  background: #310540 no-repeat center;
  background-size: cover;
  padding:3rem 1.5rem; 
  display:flex; 
  align-items:center; 
  justify-content:center; 
  text-align:center;  
  color:#fff;
  width:100%;
  max-width: 700px;
  min-height: 400px;
  box-shadow: 0 3px 1em rgba(0,0,0,0.5);
  position: relative;
  transition: 0.5s;
  transition-delay: 0.5s;
  opacity: 0;
  top:-200px;
}

.hpopup_close {
  background: transparent;
  padding:1em;
  position: absolute;
  right:0; 
  top:0;
  cursor: pointer;
  border:none;
}
  .hpopup_close svg {
      display:block;
  }

  .hpopup_close path {
      stroke:#fff;
  }

.hpopup_container {
  max-width: 500px;
}

.hpopup_message { 
  font-size:2em; 
  font-weight:bold; 
  letter-spacing: -0.03em;
  line-height: 1.3;
  margin-bottom:1.5rem
}

@media(max-width:500px){
  .hpopup_message { 
      font-size:1.5em; 
  }
}

.hpopup_link {
  text-align: center;
}

.hpopup_link a {
  color:#fff;
  display: inline-flex;
  white-space: nowrap;
}

.hpopup_link a:after {
  left: 1em;
}

#wrapper .hpopup_overlay {
  position: fixed;
  left:0; top:0; right:0; bottom:0;
  width:100% !important;
  max-width:100% !important;
  height: 100%;
  background: rgba(255,255,255,0.8);
  display:flex;
  align-items: center;
  justify-content: center;
  z-index: 99998;
  padding:0.75rem;
  visibility: hidden;
  opacity:0;
  transition:0.5s;
  overflow: hidden;
}

#wrapper .hpopup_overlay.open {
  visibility: visible;
  opacity:1;
}

#wrapper .hpopup_overlay.open .hpopup {
  opacity:1;
  top:0;
}

<?php nc_box_styles($id); ?>

<?php nc_block_custom_css(); ?>

</style>

<?php
}

?>