<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_forums_loop' ); ?>

<ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums list-group">

	<li class="bbp-header list-group-item">

		<ul class="forum-titles list-group-item">
			<li class="bbp-forum-info list-group-item"><?php _e( 'Forum', 'bbpress' ); ?></li>
			<li class="bbp-forum-topic-count list-group-item"><?php _e( 'Topics', 'bbpress' ); ?></li>
			<li class="bbp-forum-reply-count list-group-item"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></li>
			
		</ul>

	</li><!-- .bbp-header -->

	<li class="bbp-body list-group-item">

		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>

		<?php endwhile; ?>

	</li><!-- .bbp-body -->

	

</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' ); ?>
