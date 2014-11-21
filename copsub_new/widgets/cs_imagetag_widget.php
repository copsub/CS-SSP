<?php
/* CS Imagelibrary Tag Widget ---------------------*/

// Creating the widget 
class csimagetag_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'csimagetag_widget', 

// Widget name will appear in UI
__('CS image Library Tag Widget', 'csimagetag_widget_domain'), 

// Widget description
array( 'description' => __( 'Shows only Images tagged with specific tag', 'csimagetag_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

$title = get_field('_widget_title_prefix') .' '. apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes

if(get_field('_content_tags')) {
$content_tags = get_field('_content_tags');
} else {
$content_tags = 'dummy';
}
  
$postcount = 5;
                      
$r = new WP_Query(array(
    'post_type' => 'attachment',
    'post_mime_type' =>'image',
    'post_status' => 'inherit',
    'posts_per_page' => -1,
    'orderby' => 'rand',
	'tax_query' => array(
	array(
		'taxonomy' => 'media_category',
		'field' => 'slug',
		'terms' => explode(',',$content_tags)
		))));
if ($r->have_posts()) :
$images = array();

echo $args['before_widget'];

?>
	<?php echo $before_widget; ?>
    <?php if ( $title ) echo $args['before_title'] . $title . $args['after_title']; ?>
	<div id="gallery-sb">
      <?php  
	$currentcount = 0;
      
      while ($r->have_posts()) : $r->the_post(); 
      ?>
          <dl class="gallery-item">
      		<dt>
	        <a class="gallery-sb" rel="gallery-sb" href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?> ">

	        <?php 
	        if ($currentcount <= $postcount) {
	        echo wp_get_attachment_image( get_the_ID() ); 
	        } 
	        
	        $currentcount = $currentcount +1;
	        
	        ?>
	        </a>
	        </dt>
	        <dd></dd>
	    </dl>
      <?php endwhile; ?>
	</div>
	<div style="clear: both;"></div>
      <?php
      wp_reset_query();  // Restore global post data stomped by the_post().
      echo $args['after_widget'];

    endif;
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'csimagetag_widget_domain' );
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
} // Class csimagetag_widget ends here

// Register and load the widget
function csimagetag_load_widget() {
	register_widget( 'csimagetag_widget' );
}
add_action( 'widgets_init', 'csimagetag_load_widget' );


?>