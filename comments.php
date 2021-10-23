<?php if( get_theme_mod('show_comments_posts',true) == true):?>

	<?php
	// Load the CSS and JS
		wp_enqueue_style( 'nc-comments' );

		if ( is_singular( array('post', 'page') ) && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script('comment-reply');
		}
	?>

	<?php if ( post_password_required() ) {
		echo'<p class="nocomments">'.__('This post is password protected. Enter the password to view comments.', 'nc-framework').'</p>';
	return; } ?>

	<?php if (have_comments() ) : ?>
	
	<section id="comments" class="alignfull">
	<div class="ncontain">
	<h2 id="comments-header">
		<?php comments_number( 
			__('No Responses Yet', 'nc-framework'), 
			__('1 Comment', 'nc-framework'), 
			__('% Comments', 'nc-framework') 
			);?>
	</h2>
	<ol class="comment-list">
		<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 100,
					'format' => 'html5'
				) );
			?>
	</ol>
	<nav>
		<p>
			<?php paginate_comments_links();?>
		</p>
	</nav>

	
	<?php endif; // if there are comments ?>

	<?php if(comments_open()):?>

	<?php 
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' =>	'<label class="hidetext" for="wpauthor">'.__('Name', 'nc-framework').' *<br></label> ' .
		( $req ? '' : '' ) .
		'<input id="wpauthor" name="author" type="text" placeholder="'.__('Name', 'nc-framework').' *" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /><br>',
		'email' => '<label class="hidetext" for="wpemail">'.__('Email', 'nc-framework').' *<br></label> ' .
		( $req ? '' : '' ) .
		'<input id="wpemail" name="email" type="text" placeholder="'.__('Email', 'nc-framework').' *" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><br>',
		'url' =>	'<label class="hidetext" for="wpurl">'.__('Name', 'nc-framework').'<br></label>' .
		'<input id="wpurl" name="url" type="text" placeholder="'.__('Website', 'nc-framework').'" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /><br>',
	);

	$args = array(

	'comment_field' => '<label for="commentarea" class="hidetext">'.__('Comment', 'nc-framework').'<br></label>
	<textarea id="commentarea" name="comment" aria-required="true" 
	placeholder="'.__('Write your comment here. Be clear, be kind, stay on-topic, and respect everyone.','nc-framework').'"></textarea><br>',
	'cancel_reply_link' => '<span class="nc-x-close ncicon ncicon-close"></span> <span class="hidetext cancel-comment-reply-label">'.__('Cancel','nc-framework').'</span>',
	'label_submit'      => __('Post Comment','nc-framework'),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'id_submit'         => 'wpsubmit',
  'class_submit'      => 'btn',
	'logged_in_as' => '<p class="txt-small logged-in-as">' .


    sprintf( __( 'Logged in as', 'nc-framework').' <a href="%1$s">%2$s</a>. <a href="%3$s" title="'.__('Log out of this account','nc-framework').'">'.__('Log out?','nc-framework').'</a>',
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form($args);?>
	<?php endif; // if comments are open ?>

	<?php else: ?>

	<?php if(!is_page()):?>
	<p id="comments_closed"><?php _e('Comments are closed.','nc-framework');?></p>
	<?php endif;?>

	</div><!-- / end .ncontain -->
	</section><!-- / end section id="comments" -->

	<?php endif; // if get_theme_mod ?>