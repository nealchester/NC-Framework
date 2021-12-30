<footer id="megafooter">
	<div class="ncontain">

		<div class="ncolumns">
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			<div class="ncolumns_two"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>			
			<div class="ncolumns_three"><?php if (dynamic_sidebar('footer3')) { } else { }?></div>			
			<div class="ncolumns_four"><?php if (dynamic_sidebar('footer4')) { } else { }?></div>			
			<div class="ncolumns_five"><?php if (dynamic_sidebar('footer5')) { } else { }?></div>
		</div>

		<hr>
		<div class="ncontain">
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

	</div>
</footer>