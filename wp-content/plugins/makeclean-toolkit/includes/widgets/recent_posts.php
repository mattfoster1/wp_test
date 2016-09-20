<?php
/**
 * RecentPosts widget class OW
 *
 * @since 2.8.0
 */
class OW_Widget_RecentPosts extends WP_Widget {

	public function __construct() {

		$widget_ops = array( 'classname' => 'widget_recentposts', 'description' => __( "Your site&#8217;s most recent Posts with thumbnail.", "makeclean" ) );

		parent::__construct('widget_recentposts', __('OW :: Recent Posts with Thumbnail', "makeclean"), $widget_ops);

		$this->alt_option_name = 'widget_recentposts';
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', "makeclean" );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;

		if ( ! $number ) {
			$number = 3;
		}

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$qry_args = array (
			//'post_type'              => 'product',
			'post_status'            => 'publish',
			'posts_per_page'         => $number,
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
			'orderby'                => 'rand',
		);

		$qry = new WP_Query( $qry_args );

		echo html_entity_decode( $args['before_widget'] );

		if ( $title ) {
			echo html_entity_decode( $args['before_title'] . $title . $args['after_title'] );
		}

		while ( $qry->have_posts() ) : $qry->the_post();
			?>
			<div class="recent_post container-fluid no-padding">
				<div class="col-md-8 col-sm-8 col-xs-9">
					<a href="<?php echo esc_url( the_permalink() ); ?>">
						<?php the_title(); ?>
					</a>
					<span class="date"><?php echo get_the_date( 'F j, Y', get_the_ID() ); ?></span>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-3">
					<a href="<?php echo esc_url( the_permalink() ); ?>">
						<?php the_post_thumbnail('makeclean-92-72'); ?>
					</a>
				</div>
			</div>
			<?php
		endwhile;

		echo html_entity_decode( $args['after_widget'] );

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];

		return $instance;
	}

	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', "makeclean" ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', "makeclean" ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>
		<?php
	}
}
?>