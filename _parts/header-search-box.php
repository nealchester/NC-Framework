<?php /* 
This form must be place before the closing main header tag
*/?>

<form class="ncsearchreveal" role="search" method="get" action="<?php echo home_url(); ?>/">
  <label class="hidetext"><?php _e('Search Form','nc-framework'); ?></label>
  <input class="ncsearchreveal_input" id="ncsearchinput" name="s" type="search" placeholder="<?php _e('Search...','nc-framework'); ?>">
  <button class="ncsearchreveal_close" tablindex="0" type="button" title="<?php _e('Close search box','nc-framework'); ?>">
    <span class="ncsearchreveal_x ncicon nc-close"></span>
  </button>
</form>