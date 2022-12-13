<?php  
if( function_exists('get_field') 
&& get_field('chose_related_content') 
&& is_single() ): ?>

<?php $r_posts = get_field('chose_related_content');?>

<div class="ncrelated alignfull">
  <div class="ncontain">
  <header><b>Related Episodes</b></header>
    <div class="ncrelated_columns">

      <?php foreach( $r_posts as $post):?>
      <?php setup_postdata($post); ?>  

      <?php get_template_part('parts/card');?>
      
      <?php endforeach; ?>

    </div>
  </div>
</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>