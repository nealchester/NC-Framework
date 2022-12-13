<form class="ncsearchform" role="search" method="get" action="<?php echo home_url(); ?>/">
	<div class="ncsearchform_contain">
		<label for="wp-searchbox" class="hidetext"><?php _e('Search','nc-framework');?></label>
		<input class="ncsearchform_input" type="search" id="wp-searchbox" name="s" <?php if(is_search()){ echo 'placeholder="'.__('Search again','nc-framework').'"'; } else { echo 'placeholder="'.__('Search','nc-framework').'"'; } ?>>
		<button class="ncsearchform_button" type="submit">
        <span class="ncsearchform_icon ncicon nc-search"></span>
		</button>
	</div>  
</form>

<style>
/* Search Form 
 
  <form class="ncsearchform">
    <div class="ncsearchform_contain">
      <label for="wp-searchbox" class="hidetext">Search</label>
      <input class="ncsearchform_input" type="search" id="wp-searchbox" name="s" placeholder="Search">
      <button class="ncsearchform_button" type="submit">
        <svg class="ncsearchform_icon">...</svg>
      </button>
    </div>  
  </form>
 
 */

 .ncsearchform {
    --align-self:center;
    --min-height: 2.5em;
    --text-indent: 1em;
    --radius: 5px;
    --min-width:150px;
    --text-size:1em;
    --text-color:#000;
    --bg-color:#fff;
    --border: solid 1px #ddd;
    --button-width: 2.5em;
    --button-bg-color:none;
    --button-bg-color-hover:none;
    --button-color:#000;
    --button-color-hover:#000;
    --focus-text-color:#000;
    --focus-border:solid 1px #aaa;
    --focus-bg-color:#fff;
    --focus-dropshadow: 0 1px 0.3rem rgba(0,0,0,0.3);
  }


  
  .ncsearchform {
    flex-grow: 1;
    min-width:var(--min-width);
    align-self:var(--align-self);
  }
  
  .ncsearchform_contain {
    display: flex;
    position:relative;
    align-items: center;
    flex-grow: 1;
  }
  
  .ncsearchform_input {
    background: var(--bg-color);
    text-indent: var(--text-indent);
    border: var(--border);
    border-radius: var(--radius);
    width: 100%;
    font-size: var(--text-size);
    min-height:var(--min-height);
    padding-right:var(--button-width);
    outline: none;
    transition: 0.3s;
    color:var(--text-color);
  }
  
  .ncsearchform_input,
  .ncsearchform_input::-webkit-search-cancel-button {
    -webkit-appearance: none;
    appearance: none;
  }
  
  .ncsearchform_input:focus {
    border:var(--focus-border);
    background: var(--focus-bg-color);
    box-shadow: var(--focus-dropshadow);
    color:var(--focus-text-color);
  }
  
  .ncsearchform_button {
    cursor: pointer;
    background: var(--button-bg-color);
    border: none;
    position: absolute;
    right: 0;
    height:100%;
    font-size: 1em;
    border-radius:var(--radius);
    border-top-left-radius:0;
    border-bottom-left-radius:0;
    width: var(--button-width);
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    transition:0.3s;
  }
  
  .ncsearchform_icon {
    color: var(--button-color);
    display: block;
    transition: 0.3s;
  }
  
  .ncsearchform_button:hover {
    background: var(--button-bg-color-hover);
  }
  
  .ncsearchform_button:hover .ncsearchform_icon {
    color: var(--button-color-hover);
  }
  
  /* Modifier 
  Stretch
  */
  
  .ncsearchform-stretch {
    align-self:stretch;
    position:relative;
    display: flex;
  }
  .ncsearchform-stretch .ncsearchform_contain {
    align-items: stretch;
  }
  
  .ncsearchform-stretch .ncsearchform_input {
    align-items: stretch;
  }
  
  .ncsearchform-stretch .ncsearchform_input,
  .ncsearchform-stretch .ncsearchform_button {
    border-radius:0;
  }

</style>