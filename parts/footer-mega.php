<footer id="footer">
	<?php /* Mega footer
	<div class="ncontain footer_columns">
		<div class="footer_column1"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
		<div class="footer_column2"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>			
		<div class="footer_column3"><?php if (dynamic_sidebar('footer3')) { } else { }?></div>			
		<div class="footer_column4"><?php if (dynamic_sidebar('footer4')) { } else { }?></div>			
		<!-- <div class="footer_column5"><?php if (dynamic_sidebar('footer5')) { } else { }?></div> -->
	</div>
	*/ ?>

	<hr class="footer_divider">

	<div class="ncontain footer_base">
		<nav class="footer_nav" aria-label="secondary navigation">
			<ul class="footer_menu">
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
		</nav>
		<?php if(get_theme_mod('add_html_copyright')): ?>
		<div class="copyright">
			<span class="copyright_symbol">&copy;</span>
			<span class="copyright_date"><?php echo date("Y") ?></span>
			<span class="copyright_divider">|</span>
			<span class="copyright_name"><?php echo get_theme_mod('add_html_copyright'); ?></span>
		</div>
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