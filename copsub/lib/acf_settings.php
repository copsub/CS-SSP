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
		'page_title' 	=> 'Livestream Settings',
		'menu_title'	=> 'Livestream',
		'parent_slug'	=> 'cs-settings',
	));
}


?>