</main>
<?php if(get_theme_mod('body_layout') == 'content-left' || get_theme_mod('body_layout') == 'content-right'):?>
<aside class="ncontent_sidebar"><?php get_template_part('parts/sidebar')?></aside>    
<?php endif; ?>
</div>
</section>

<?php get_template_part('parts/footer');?>