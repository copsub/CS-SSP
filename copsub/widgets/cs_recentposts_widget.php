<?php


/* CS Recent Post Widget ---------------------*/

class CS_Recent_Posts extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'cs_recent_posts',
			__( 'CS Recent Posts', 'copsub' ),
			array(
				'description' => __( 'Most recent posts on site.', 'copsub' ),
				'classname'   => 'widget_recent_entries',
			)
		);

	}

	public function widget( $args, $instance ) {

		$title  = ( ! empty( $instance['copsub_title']  ) ) ? $instance['copsub_title'] : __( 'Recent Posts' );
		$number = ( ! empty( $instance['copsub_number'] ) ) ? absint( $instance['copsub_number'] ) : 5;

		if ( ! $number )
			$number = 5;

		// Before widget tag
		echo $args['before_widget'];

		// Title
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Recent Posts
		$query = new WP_Query( array (
			'posts_per_page'      => $number,
			'ignore_sticky_posts' => true
		) );
		if ( $query->have_posts() ) :

			echo '<ul>';
			while ( $query->have_posts() ) : $query->the_post();
				$post_title = ( get_the_title() ? get_the_title() : get_the_ID() );
				$post_date = ( get_the_date( 'd.m.Y' ) );
				$post_excerpt = ( excerpt(20) );
				
				echo '<li><span class="date">' . $post_date . '</span>';
				echo '<a href="' . get_permalink() . '">' . $post_title . '</a>';
				echo '<div>' . $post_excerpt . '</div>';
				echo '</li>';
			endwhile;
			echo '</ul>';

		endif;
		wp_reset_postdata();

		// After widget tag
		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
			'copsub_title' => '',
			'copsub_number' => '5',
		) );

		// Retrieve an existing value from the database
		$copsub_title = !empty( $instance['copsub_title'] ) ? $instance['copsub_title'] : '';
		$copsub_number = !empty( $instance['copsub_number'] ) ? $instance['copsub_number'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'copsub_title' ) . '" class="copsub_title_label">' . __( 'Title', 'copsub' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'copsub_title' ) . '" name="' . $this->get_field_name( 'copsub_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'copsub' ) . '" value="' . esc_attr( $copsub_title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'copsub_number' ) . '" class="copsub_number_label">' . __( 'Posts to show', 'copsub' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'copsub_number' ) . '" name="' . $this->get_field_name( 'copsub_number' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'copsub' ) . '" value="' . esc_attr( $copsub_number ) . '">';
		echo '	<span class="description">' . __( 'Number of posts to show.', 'copsub' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['copsub_title'] = !empty( $new_instance['copsub_title'] ) ? strip_tags( $new_instance['copsub_title'] ) : '';
		$instance['copsub_number'] = !empty( $new_instance['copsub_number'] ) ? strip_tags( $new_instance['copsub_number'] ) : '';

		return $instance;

	}

}

function copsub_register_widgets() {
	register_widget( 'CS_Recent_Posts' );
}
add_action( 'widgets_init', 'copsub_register_widgets' );

?>