<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : else : ?>
<a href="<?php echo home_url();?>/wp-admin/widgets.php"><?php _e('Add some widgets here','nc-framework');?></a>
<?php endif; ?>