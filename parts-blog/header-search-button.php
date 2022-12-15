<label class="ncsearchtrigger" for="ncsearchinput" title="<?php _e('reveal search box','nc-framework'); ?>">
  <span class="hidetext"><?php _e('Search','nc-framework'); ?></span>
  <span class="ncicon nc-search"></span>
</label>

<style>

    .ncsearchtrigger {
        cursor:pointer;
        padding:3px; /* for Firefox and Edge */
        align-self: center;
        margin-inline: var(--gap);
        position: relative;
        color:var(--pink);
        transition:0.3s;
        animation-name: ftop;
    }

    .ncsearchtrigger:after {
        content:'';
        display: block;
        width: 45px;
        height: 45px;
        position: absolute;
        left: -40%;
        top: -40%;
    }

    .ncsearchtrigger:hover {
        color:#fff;
    }
    
    
    /* Search form, field, and close button */
    
    .ncsearchreveal {
      --bg-color-start: var(--red);
      --bg-color-end: #333;
      --text-color: #fff;
      --text-size: 1.2em;
      --text-align: left;
      --field-padding: 0.5rem 1.5rem;
      --field-border: solid 1px #000;
      --x-button-size: 1.25em;
      --x-button-color: #fff;
      --x-button-color-hover: #fff;
    }
    
    .ncsearchreveal {
    position:absolute;
    top:0;left:0;
    width:100%;
    height:100%;
    margin:0;
    
    /* for the positioning of the close button */
    display:flex;
    align-items:center;
    justify-content:flex-end;
    padding-left:1.5rem;
    padding-right:1.5rem;
    
    /* Must be hidden for header elements to interactive */
    visibility:hidden;
    }
    
    .ncsearchreveal_input {
    position:absolute;
    left:0;
    bottom:100%;
    height:100%;
    width:100%;
    padding:var(--field-padding);
    border:var(--field-border);
    outline:none;
    font-size:var(--text-size);
    background-color:var(--bg-color-start);
    color:var(--text-color);
    z-index:4;
    text-align:var(--text-align);
    transition:0.3s;
    visibility:visible; /* Must be visible to be interactive */
    }
    
    /* Currently this is hidden in place of a close field button */
    
    .ncsearchreveal_input::-webkit-search-cancel-button {
    -webkit-appearance: none;
    appearance: none;
    height:1.5rem;
    width: 1.5rem;
    cursor:pointer;

    background-repeat:no-repeat;
    background-position:center;
    background-size:contain;
    display:none;
    }
    
    .ncsearchreveal_input:focus {
    bottom:0;
    top:auto;
    box-shadow:0 0 1em rgba(0,0,0,0.3);
    background-color:var(--bg-color-end);
    }
    
    .ncsearchreveal_close {
      padding: 0 1em;
      background: none;
      border: none;
      display: block;
      cursor: pointer;
      transition: 0.1s;
      visibility: hidden;
      opacity: 0;
      position: absolute;
      right: 0;
      height: 100%;
    }
    
    .ncsearchreveal_input:focus + .ncsearchreveal_close{
    visibility:visible;
    z-index:6;
    opacity:1;
    }
    
    .ncsearchreveal_x {
        font-size:var(--x-button-size); 
        display:block; 
        color:var(--x-button-color);
        transition:0.3s;
    }
  
    .ncsearchreveal_x:hover {
        color:var(--x-button-color-hover);
    }
    
  </style>