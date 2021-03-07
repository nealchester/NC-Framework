<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : else : ?>
<a href="<?php echo home_url();?>/wp-admin/widgets.php">Add some widgets here</a>
<?php endif; ?>