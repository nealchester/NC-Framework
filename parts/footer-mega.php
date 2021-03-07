<?php // Mega Footer

$gaps = get_theme_mod('footer_style','footer-gaps') == 'footer-gaps';

$c0 =  get_theme_mod('footer_count', '0') == '0';
$c1 =  get_theme_mod('footer_count', '0') == '1';
$c2 =  get_theme_mod('footer_count', '0') == '2';
$c3 =  get_theme_mod('footer_count', '0') == '3';
$c4 =  get_theme_mod('footer_count', '0') == '4';
$c5 =  get_theme_mod('footer_count', '0') == '5';
?>

<?php if($c0):?>
<?php else:?>

<footer id="megafooter">
	<div class="ncontain">
		<div class="ncolumns<?php if(!$gaps && !$c0){ echo' ncolumns-borders';} echo' '.get_theme_mod('footer_lay', 'ncolumns-flow');?>">
		
			<?php if($c1):?>
		
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			
			<?php elseif($c2):?>
			
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			<div class="ncolumns_two"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>
			
			<?php elseif($c3):?>
			
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			<div class="ncolumns_two"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>			
			<div class="ncolumns_three"><?php if (dynamic_sidebar('footer3')) { } else { }?></div>
			
			<?php elseif($c4):?>
			
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			<div class="ncolumns_two"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>			
			<div class="ncolumns_three"><?php if (dynamic_sidebar('footer3')) { } else { }?></div>			
			<div class="ncolumns_four"><?php if (dynamic_sidebar('footer4')) { } else { }?></div>
			
			<?php elseif($c5):?>
			
			<div class="ncolumns_one"><?php if (dynamic_sidebar('footer1')) { } else { }?></div>
			<div class="ncolumns_two"><?php if (dynamic_sidebar('footer2')) { } else { }?></div>			
			<div class="ncolumns_three"><?php if (dynamic_sidebar('footer3')) { } else { }?></div>			
			<div class="ncolumns_four"><?php if (dynamic_sidebar('footer4')) { } else { }?></div>			
			<div class="ncolumns_five"><?php if (dynamic_sidebar('footer5')) { } else { }?></div>
			
			<?php endif;?>
			
		</div>
	</div>
</footer>

<?php endif;?>