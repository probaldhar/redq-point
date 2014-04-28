<?php

/*
Plugin Name: T Latest Posts
Plugin URI: http://www.tarex.name
Description: Grab your Latest Posts
Auther: Tareq
Auther URI: http://github.tarex.io
Version: 1.0
*/

class Tx_Latest_posts extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Your site&#8217;s Latest Posts.") );
		parent::__construct('recent-posts', __('Latest Posts'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);
		extract($instance);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Latest Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number )
 			$number = 10;
 		$words = ( ! empty( $instance['words'] ) ) ? absint( $instance['words'] ) : 30;
		if ( ! $words )
 			$words = 30;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_image = isset( $instance['show_image'] ) ? $instance['show_image'] : true;


		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>

		<li class="e-widget m-posts">
			<h3 class="e-widget-title"><?php if ( $title ) echo $before_title . $title . $after_title; ?></h3>
			<div class="e-widget-content">
				<ul class="e-post-list">
		
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
		
				<li class="e-post">
							<h4 class="e-post-title"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
							<?php if ( has_post_thumbnail() && $show_image == true ) {
											$image_id =  get_post_thumbnail_id( get_the_ID() );
											$large_image = wp_get_attachment_image_src( $image_id ,'huge');  
										 ?>
										<p class="e-post-image"><a href="<?php the_permalink(); ?>" class="e-post-thumb"><img src="<?php echo $large_image[0]; ?>" alt=""></a></p>
							<?php	} ?>
							<p class="e-post-excerpt"><?php wp_trim_words( the_content(), $words, '<a href="'. get_permalink() .'"> ...Read More</a>' ); ?></p>
				</li>
				
		<?php endwhile; ?>
				</ul>
			</div>
		</li>
		
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['words'] = (int) $new_instance['words'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : true;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$words    = isset( $instance['words'] ) ? absint( $instance['words'] ) : 30;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : true;

?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id( 'words' ); ?>"><?php _e( 'words of words to be displayed:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'words' ); ?>" name="<?php echo $this->get_field_name( 'words' ); ?>" type="text" value="<?php echo $words; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_image ); ?> id="<?php echo $this->get_field_id( 'show_image' ); ?>" name="<?php echo $this->get_field_name( 'show_image' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_image' ); ?>"><?php _e( 'Display post image?' ); ?></label></p>
<?php
	}
}

add_action('widgets_init', 'tx_latest_posts');

function tx_latest_posts(){
	register_widget('Tx_Latest_posts');
}
