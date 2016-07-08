<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Copenhagen Suborbitals Settings',
		'menu_title'	=> 'CS Settings',
		'menu_slug' 	=> 'cs-settings',
		'capability'	=> 'edit_posts',
		'position' 		=> '1.9365',
		'redirect'		=> false
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Frontpage Settings',
		'menu_title'	=> 'Frontpage',
		'parent_slug'	=> 'cs-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Mission Landing Page Settings',
		'menu_title'	=> 'Mission Landing Page',
		'parent_slug'	=> 'cs-settings',
	));
}


function my_acf_save_post( $post_id ) {
    
    // get new value
  	$launch_message = get_field( 'front_launch_message', 'option' );
    
    
    // do something
    if (function_exists(‘w3tc_pgcache_flush’)) {
		w3tc_pgcache_flush();
	}
    //update_field('front_launch_message', 'blabla', 'option');
}

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'my_acf_save_post', 20);



?>