<?php if( is_page_template('templates/blank.php') or is_author() ) :?>

<?php else :?>

	<section id="banner">
		<div class="ncontain">
			<div class="banner_content">
				<?php get_template_part('parts/headings');?>
			</div>
		</div>
	</section>
	
<?php endif; ?>

<style>

/* Banner Hero Image */

#banner.nchero {
    --overlay-opacity: 0.5;
    --overlay-color: #222;
    --overlay-blend-mode: normal;
    --image-focus: center center;
    --image-blend-mode: normal;
    --text-color: #fff;
    --text-align: left;
    --max-container-width: 1400px;
    --content-dropshadow: 0 2px 6px rgba(0,0,0,0.3);
    --content-max-width: 600px;
    --content-position-x: flex-start;
    --content-position-y: flex-end;
    --content-padding: 3em 0;
    --box-min-height: 85vh;
    --box-bgcolor: #222;
}

body.archive #banner,
body.search #banner,
body.blog #banner {
    --width-max: var(--width-wide);
}

#banner + .ncontent { padding-top:3em; background:#fff; position: relative; }

/* Responsive 
@media(max-width:640px){
    #banner {
        --box-min-height: auto; 
        --text-align: center;
        --content-position-x: center;        
        --content-padding: 1em 0 2em;
        --box-bgcolor: #222;
        --overlay-color: linear-gradient(rgba(0, 0, 0, 0) 10%, #000 100%);
    }
    
    #banner .nchero_image { 
        position:static; 
        height:40vh; 
        top:0; 
    }

    #banner .nchero:after {
        height: 40.1vh;
        top:0 !important;
    }
}
*/

/* Banner Split Image */

#banner.ncsplit {
    --image-position: center center;
    --text-color: #ccc;
    --bg-color: var(--dark);
    --text-padding: 3em;
    --box-min-height: 400px;
    --content-max-width: 600px;
    --display-caption: block;
    --caption-align: left;
    --width-max: 1300px;
}

@media(max-width:640px){
    #banner.ncsplit {
    flex-direction:column;
    min-height:0;
    }

    #banner .ncsplit_image {
    min-height:0;
    width:100%;
    }

    #banner .ncsplit_pic {
    position:static;
    }

    #banner .ncsplit_content {
    padding:3em 0 !important;
    display:block;
    }

    #banner .ncsplit_image, 
    #banner .ncsplit_content {
    flex-basis: auto;
    }

    #banner .ncsplit_contentcontain {
    max-width:var(--content-max-width);
    width:calc(100% - 2 * var(--gap));
    margin:0 auto;
    padding-left:0 !important;
    padding-right:0 !important;
    }

/* Modifier: Make the image always stack on top */
#banner.ncsplit-imagetop .ncsplit_image { order:1 }
#banner.ncsplit-imagetop .ncsplit_content { order:2 }

}

</style>