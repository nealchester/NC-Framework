<footer id="footer">
	<hr>
	<div class="ncontain">
		<ul class="navmenu">
			<?php wp_nav_menu (array( 
			'container' => '', 
			'theme_location' => 'footer-menu',
			'items_wrap' => '%3$s',
			'fallback_cb' => '',
			'depth' => 1,
			)); ?>
			<li class="toplink">
				<a class="toplink_anchor" href="#pagetop">
					<span class="toplink_label">Top</span>
					<span class="toplink_icon"><!-- use a psuedo element --></span>
				</a>
			</li>			
		</ul>
		<?php if(get_theme_mod('add_html_copyright')): ?>
		<div class="copyright"><?php echo get_theme_mod('add_html_copyright'); ?></div>
		<?php else:?>
		<div class="copyright">
			<span class="copyright_symbol">&copy;</span>
			<span class="copyright_date"><?php echo date("Y") ?></span>
			<span class="copyright_divider">|</span>
			<span class="copyright_name"><?php bloginfo('name'); ?></span>
		</div>
		<?php endif;?>		
	</div>
</footer>