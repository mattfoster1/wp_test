<?php
/**
 * PortfolioGallery widget class OW
 *
 * @since 2.8.0
 */
class OW_Widget_PorfolioGallery extends WP_Widget {

	public function __construct() {

		$widget_ops = array( 'classname' => 'widget_portfoliogallery', 'description' => __( "Your site&#8217;s most recent portfolio.", "makeclean" ) );

		parent::__construct('widget_portfoliogallery', __('OW :: Portfolio Gallery', "makeclean"), $widget_ops);

		$this->alt_option_name = 'widget_portfoliogallery';
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Portfolio Gallery', "makeclean" );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 6;

		if ( ! $number ) {
			$number = 6;
		}

		/**
		 * Filter the arguments for the Portfolio Gallery widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$qry_args = array (
			'post_type'              => 'ow_portfolio',
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
		?>
		<ul>
			<?php
			while ( $qry->have_posts() ) : $qry->the_post();
				?>
				<li>
					<a href="<?php echo esc_url( the_permalink() ); ?>">
						<?php the_post_thumbnail('makeclean-88-88'); ?>
					</a>
				</li>
				<?php
			endwhile;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
			?>
		</ul>
		<?php
		echo html_entity_decode( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];

		return $instance;
	}

	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
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