<?php

/*-----------------------------------------------------------------------------------*/
/* No posts menu
/*-----------------------------------------------------------------------------------*/

function sprig_remove_posts_menu() {
	remove_menu_page( 'edit.php' );  // posts
	remove_menu_page( 'index.php' ); // dashboard
	remove_menu_page( 'tools.php' ); // dashboard
}
add_action('admin_init', 'sprig_remove_posts_menu');

function sprig_edit_admin_bar() {
	global $wp_admin_bar;

	$new_content_node = $wp_admin_bar->get_node('new-content');
	$new_content_node->href = '?post_type=page';
	$wp_admin_bar->add_node($new_content_node);

	$site_name_node = $wp_admin_bar->get_node('site-name');
	if ($site_name_node->href == admin_url()) {
		$site_name_node->href = admin_url('admin.php?page=nestedpages');
	}
	$wp_admin_bar->add_node($site_name_node);


	$wp_admin_bar->remove_menu('wp-logo'); // This line deactivate WP logo and it menu.

	// if you want the logo but not the menu put this line :
	// $wp_admin_bar->remove_menu('about'); // This line deactivate about link
	// $wp_admin_bar->remove_menu('wporg'); // This line deactivate wordpress.org link
	// $wp_admin_bar->remove_menu('documentation'); // This line deactivate the documentation link
	// $wp_admin_bar->remove_menu('support-forums');  // This line deactivate the support-forum link
	// $wp_admin_bar->remove_menu('feedback'); // This line deactivate the feedback link
	//
	$wp_admin_bar->remove_menu('view-site'); // This line deactivate the sub-menu go to the site but not the button in the bar with the name of your site
	$wp_admin_bar->remove_node('new-post');
	$wp_admin_bar->remove_node('dashboard');
}
add_action('wp_before_admin_bar_render', 'sprig_edit_admin_bar');


function custom_menu_order() {
	return array( 'nestedpages', 'edit.php?post_type=slide' );
}

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'custom_menu_order' );
