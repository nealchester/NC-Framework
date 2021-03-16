<?php get_template_part('parts/header');?>
<?php 
if (get_theme_mod('body_contained') == 'no-body-contain'){ $pagefull = 'ncontent-full'; } 
if (get_theme_mod('body_contained') == 'body-contain'){ $pagefull = ''; }
else { $pagefull = 'ncontent-full';}

if(get_theme_mod('body_layout') == 'content-single') { $pagelayout = 'ncontent-alone'; }
elseif(get_theme_mod('body_layout') == 'content-left') { $pagelayout = 'ncontent-left';}
elseif(get_theme_mod('body_layout') == 'content-right') { $pagelayout = 'ncontent-right';}
else { $pagelayout = 'ncontent-alone'; }
?>


<section id="body" class="ncontent<?php echo' '.$pagelayout.' '.$pagefull; ?>">
<div class="ncontain">    
<main class="ncontent_main" itemprop="articleBody mainContentOfPage">