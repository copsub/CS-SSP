<?php


/* CS WatchUs Widget ---------------------*/

// Creating the widget 
class cswatch_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'cswatch_widget', 

// Widget name will appear in UI
__('CS Watch Us Widget', 'cswatch_widget_domain'), 

// Widget description
array( 'description' => __( 'CS Watch Us Widget', 'cswatch_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
//echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

echo ( '<div class="watch">' );

//echo ( '<a style="color: #fff;" rel="lightbox" href="https://www.youtube.com/watch?v=1i3HDv2s7io&width=640&height=480">'.$title.'</a>' );

echo ( '<a  class="videofbox fancybox.iframe" style="color: #fff;" href="https://www.youtube.com/embed/1i3HDv2s7io">'.$title.'</a>' );

echo ( '<span></span>' );
echo ( '</div>' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'cswatch_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class cswatch_widget ends here

// Register and load the widget
function cswatch_load_widget() {
	register_widget( 'cswatch_widget' );
}
add_action( 'widgets_init', 'cswatch_load_widget' );

?>