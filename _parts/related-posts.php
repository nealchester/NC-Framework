<?php  
$related_posts = get_field('chose_related_content');
if( function_exists('get_field') && $related_posts ): 
?>

<div class="ncrelposts alignfull">
  <div class="ncontain">
    <header><b>Related Episodes</b></header>
    <div class="ncrelposts_columns">

      <?php foreach( $related_posts as $post): 
        setup_postdata($post);
      ?>  

      <?php get_template_part('parts/card');?>
      
      <?php endforeach; ?>

    </div>
  </div>
</div>

<style>

.ncrelposts {
    padding: 3rem 0; /* must match --bottom-box-padding */
    border-top:solid 1px #ddd;
    margin-top: 3rem;
}


.ncrelposts header {
    position:absolute;
    left:-1em;
    top:-3.75rem;
    font-size:0.6em;
    text-transform:uppercase;
    background-color:#fff;
    height:1.5rem;
    display:flex;
    align-items:center;
    padding:1em;
    color:#aaa;
    letter-spacing:5px
}

.ncrelposts header b { 
  font-weight:400 
}


.ncrelposts .ncontain {
    position: relative;
}


.ncrelposts_columns {
  display: flex;
  gap:var(--gap);
}


.ncrelposts .lcard {
    --card-margin-bottom:0;
    --card-padding: 0;
    --card-bg-color: transparent;
    --card-bg-color-hover: transparent;
    --card-flex-direction: column;
    --card-border: none;
    --card-border-hover: none;
    --card-bshadow: none;
    --image-width: 100%;
    --image-height: 30%;
    --text-padding: 1rem;
    --border-radius: 0;
    --text-size: 1em;
    --text-color: #000;
    --text-color-hover: #000;
    --trans-speed: 0.3s;
}

.ncrelposts .lcard_title { 
  font-weight:600; 
}

.ncrelposts .lcard:hover .lcard_title { 
  color:#000; 
}

.ncrelposts .lcard_meta,
.ncrelposts .lcard_desc {
display:none;
}

@media(max-width:800px){

  .ncrelposts_columns {
      flex-direction:column;
  }

}

</style>

<?php wp_reset_postdata(); endif; ?>