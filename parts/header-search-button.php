<label class="ncsearchtrigger" for="ncsearchinput" title="<?php _e('reveal search box','nc-framework'); ?>">
  <span class="hidetext"><?php _e('Search','nc-framework'); ?></span>
  <svg class="ncsearchtrigger_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
  <g transform="translate(0 -13.5)"><g transform="translate(0 13.5)"><path d="M20.149,31.771,30,41.622,28.122,43.5l-9.851-9.851a11.284,11.284,0,1,1,1.878-1.878Zm-8.863,1.644a8.63,8.63,0,1,0-8.63-8.63A8.63,8.63,0,0,0,11.285,33.415Z" transform="translate(0 -13.5)"/></g></g>
  </svg>
</label>


<style>

  /* NC Search Reveal 

<header>

<!-- form sits as first thing in the header -->
<form class="ncsearchreveal">
  <input class="ncsearchreveal_input" id="ncsearchinput" name="s" type="search" placeholder="Search 300+ resources...">
  <button class="ncsearchreveal_close" tablindex="0" type="button" title="close search">
    <svg class="ncsearchreveal_x"></svg>
  </button>
</form>

<div class="ncontain">

  <b class="logo">Logo</b>
  <nav>...</nav>

  <!-- Reveal search box trigger label element -->
  <label class="ncsearchtrigger" for="ncsearchinput" title="reveal search box">
    <span hidden="">Search</span> 
    <svg class="ncsearchtrigger_icon"></svg>
  </label>

</div>
</header>

*/

.ncsearchtrigger {
cursor:pointer;
padding:3px; /* for Firefox and Edge */
align-self: center;
}

.ncsearchtrigger_icon {
display:block;
height:1.5em;
width:auto;
fill:#000;
transition:0.3s;
}

.ncsearchtrigger:hover .ncsearchtrigger_icon {
fill:#000;
}


/* Search form, field, and close button */

.ncsearchreveal {
  --bg-color-start: #333;
  --bg-color-end: #333;
  --text-color: #fff;
  --text-size: 1.2em;
  --text-align: left;
  --field-padding: 0.5rem 1.5rem;
  --field-border: solid 1px #000;
  --x-button-height: 1.5em;
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
height:var(--x-button-height); width:auto; display:block;
}

.ncsearchreveal_xcolor { fill:var(--x-button-color); transition:0.3s; }

.ncsearchreveal_close:hover .ncsearchreveal_xcolor {
fill:var(--x-button-color-hover);
}

</style> 