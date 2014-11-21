<?php


/* CS Post Tag Widget ---------------------*/

// Creating the widget 
class csposttag_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'csposttag_widget', 

// Widget name will appear in UI
__('CS Post Tag Widget', 'csposttag_widget_domain'), 

// Widget description
array( 'description' => __( 'Shows only posts tagged with specific tag', 'csposttag_widget_domain' ), ) 
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

//Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                      
$r = new WP_Query(array('nopaging' => 0,	
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'tag' => $content_tags));
if ($r->have_posts()) :
echo $args['before_widget'];

?>
	<?php echo $before_widget; ?>
    <?php if ( $title ) echo $args['before_title'] . $title . $args['after_title']; ?>
	<?php if ( !$thumbnail) { ?>
    	<ul>
	  <?php } ?>
      <?php  while ($r->have_posts()) : $r->the_post(); ?>
		<?php if ( $thumbnail ) {
		  $thumb_urls = get_post_meta(get_the_ID(), 'thumbnail_url');
		  $thumb = $thumb_urls[0];
		?>
		  <div style="margin-top: 5px;">
		    <img src="<?php echo $thumb ?>"
                 style="display:inline; margin:0 5px 0 0; border:1px solid black; width:90px; height:60px; float: left;"/>
	    <?php } else { ?>	
		  <li>
        <?php } ?>
	        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
		<?php if ( !$thumbnail) { ?>
	  	  </li>
		<?php } else { ?>
		  </div><div style="clear: both;"></div>
		<?php } ?>
      <?php endwhile; ?>
	  <?php if ( !$thumbnail) { ?>
        </ul>
	  <?php } ?>
      <?php echo $after_widget; ?>
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
$title = __( 'New title', 'csposttag_widget_domain' );
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
} // Class csposttag_widget ends here

// Register and load the widget
function csposttag_load_widget() {
	register_widget( 'csposttag_widget' );
}
add_action( 'widgets_init', 'csposttag_load_widget' );


?>