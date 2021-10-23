<?php if ( function_exists('yoast_breadcrumb') && is_singular() && !is_attachment() ):?>
<p class="yoast-breadcrumbs"><?php yoast_breadcrumb();?></p>
<?php elseif( is_archive() || is_post_type_archive() || is_home() || is_search() ):?>
<?php nc_current_page();?>
<?php endif; ?>

<?php // H1
echo '<h1 itemprop="name headline" class="maintitle_heading">'; 

    if(is_singular()) { single_post_title(); }

elseif(is_search()){ echo __('Search results for','nc-framework').' &#8220;'.esc_html( get_search_query( false ) ).'&#8221;'; }

elseif(is_404()) { _e('That page doesn&#8217;t exist','nc-framework'); }

elseif(is_category()) { single_cat_title('<span class="maintitle_pretext">'.__('Category','nc-framework').'<span class="maintitle_colon">: </span></span>'); }

elseif(is_tag()) { single_tag_title('<span class="maintitle_pretext">'.__('Post Tagged','nc-framework').'<span class="maintitle_colon">: </span></span>'); }

elseif(is_day()) { echo '<span class="maintitle_pretext">'.__('Archive for','nc-framework').'<span class="maintitle_colon">: </span></span>'.the_time('jS F Y'); }

elseif(is_month()) { echo '<span class="maintitle_pretext">'.__('Archive for','nc-framework').'<span class="maintitle_colon">: </span></span>'.the_time('F Y'); }

elseif(is_year()) { echo '<span class="maintitle_pretext">'.__('Archive for','nc-framework').'<span class="maintitle_colon">: </span></span>'.the_time('Y'); }

elseif(is_author()) { _e('Author Profile','nc-framework'); }

elseif(is_front_page() && is_home()) { 
    if (get_theme_mod('nc_custom_blog_title')) { 
        echo get_theme_mod('nc_custom_blog_title');
    }else {
        echo get_bloginfo('name');
    } 
}

elseif(is_front_page()) { single_post_title(); }

elseif(is_home()) { single_post_title(); }

elseif(is_post_type_archive()) { post_type_archive_title('<span class="maintitle_pretext">'.__('Post Type','nc-framework').'<span class="maintitle_colon">: </span></span>'); }

elseif(is_tax()) { single_term_title('<span class="maintitle_pretext">'.nc_taxonomy_name().'<span class="maintitle_colon">: </span></span>'); }

elseif(function_exists ('is_bbpress')) { the_title(); }

else { single_post_title(); }

echo '</h1>';?>

<?php if(is_singular('post')):?>
    <?php if( get_theme_mod('main_title_format', 'plain-text') == 'hero-text' || 
    get_theme_mod('main_title_format', 'plain-text') == 'split-text' ):?>
    <?php get_template_part('parts/meta-avatar-banner');?>
    <?php endif;?>
<?php endif; ?>

<?php if(term_description()):?>
<div id="term-desc"><?php echo term_description(); ?></div>
<?php endif;?>