<?php

/* CS WatchUs Widget ---------------------*/

// Creating the widget 
class cslivestream_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'cslivestream_widget', 

// Widget name will appear in UI
__('CS livestream Widget', 'cslivestream_widget_domain'), 

// Widget description
array( 'description' => __( 'CS livestream Widget', 'cslivestream_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
$plugin_url = home_url();
$url_for_steaming_link = get_youtube_streaming_url_from_text_file();


echo ( '<div class="livestream_widget">' );

echo ( '<a style="color: #fff;" rel="lightbox" href="'.$url_for_steaming_link.'"><div class="widget_content">' );
echo ( '<img src="'.$plugin_url.'/wp-content/plugins/copsub/widgets/img/youtube-logo.jpg" style="width:200px;">' );
echo ( '<span></span>' );
echo ( '</div></a>' );
echo ( '</div>' );


echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'cslivestream_widget_domain' );
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
} // Class cslivestream_widget ends here

// Register and load the widget
function cslivestream_load_widget() {
	register_widget( 'cslivestream_widget' );
}
add_action( 'widgets_init', 'cslivestream_load_widget' );

?>