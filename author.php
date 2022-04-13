<?php get_template_part('parts/header')?>
<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

	<div class="authorpage">

		<header class="authorpage_header">
			<div class="authorpage_avatar"><?php echo get_avatar( $curauth->ID , 300 ); ?></div>
			<div class="authorpage_headercontain">
				<h1 class="authorpage_name" itemprop="author" itemscope itemtype="http://schema.org/Person"><?php echo esc_html($curauth->display_name);?></h1>
				<?php /* if($curauth->user_email):?><div class="authorpage_email"><?php echo esc_html($curauth->user_email); ?><div><?php endif; */?>
				<?php if($curauth->phonenumber):?><div class="authorpage_phonenumber"><?php echo esc_html($curauth->phonenumber); ?><div><?php endif;?>
				<?php if($curauth->description == !''):?>
				<p class="authorpage_bio"><?php echo esc_html($curauth->description); ?></p>
				<?php endif;?>
				<?php get_template_part('parts/meta-social');?>
			</div>
		</header>

		<div class="authorpage_content">					
			<h2 class="authorpage_listheading ncrule ncrule-left base normal"><?php _e('Articles by', 'nc-framework');?> <?php echo esc_html($curauth->display_name); ?></h2>
			<?php if (have_posts()) : ?>
			<ol class="authorpage_articlelist">
				<?php while (have_posts()) : the_post();?>
				<li>
					<span class="authorpage_link"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></span>
					<span class="authorpage_date"><?php the_time(get_option('date_format')); ?></span>
				</li>
				<?php endwhile;?>
			</ol>
			<?php endif; get_template_part('parts/paginate');?>
		</div>
	</div>

<?php get_template_part('parts/footer')?>

<style>

.authorpage_header {
    display:grid;
    grid-template-columns:1fr 3fr;
    grid-gap:1.5em;
    margin-top:3em;
    align-items: start;
}

.authorpage_avatar img {
    border-radius:50%;
    display:block;
    width:100%;
}

/*
.authorpage .socialbuttons_link {
    background-color:var(--green)
}

.authorpage .socialbuttons_link:hover {
    background-color:var(--dark)
}
*/

@media(max-width:460px){
    .authorpage_header {
        grid-template-columns:1fr;
    }
    .authorpage_avatar img {
        width:50%;
        min-width:150px;
        border-radius:50%;
        margin:0 auto;
        display:block;
    }
    .authorpage_headercontain {
        text-align:center;
    }

    .authorpage_headercontain .socialbuttons {
        justify-content:center;
    }
}

.authorpage_name { margin-bottom:calc(var(--gap) / 2); color: #000;}

.authorpage_content {
    padding:0; margin:0; border:none;
}

.authorpage_articlelist {
    margin-bottom:3em;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-gap: 1em 3em;
    list-style-type: decimal-leading-zero;
    list-style-position: inside;
    padding-left: 0;
}

.authorpage_articlelist li {
    font-weight: bold;
}

.authorpage_link {
    display:block;
}

.authorpage_date {
 font-weight: normal; color:#999;
 font-size:var(--txt-small);
}

.authorpage_listheading {
    padding:4em 0 3em;
    margin-bottom:0;
    text-transform: none;
    color: #000;
}


</style>