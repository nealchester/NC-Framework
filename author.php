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