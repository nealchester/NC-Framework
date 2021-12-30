<?php if( is_page_template('templates/blank.php') or is_author() ) :?>

<?php	elseif( is_singular() ) :?>

	<section id="banner">
		<div class="ncontain">
			<div class="banner_content">
				<?php get_template_part('parts/headings');?>
			</div>
		</div>
	</section>

<?php	elseif( is_home() or is_archive() or is_404() or is_post_type_archive() or is_search() ) :?>

	<section id="banner">
		<div class="ncontain">
			<div class="banner_content">
				<?php get_template_part('parts/headings');?>
			</div>
		</div>
	</section>
	
<?php endif; ?>