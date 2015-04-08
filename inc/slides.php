<?php

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type - Slides */
/*-----------------------------------------------------------------------------------*/

function sprig_add_slides() {
	$labels = array(
		'name' => __('Slides', 'post type general name', 'sprig'),
		'singular_name' => __('Slide', 'post type singular name', 'sprig'),
		'add_new' => __('Add New', 'slide', 'sprig'),
		'add_new_item' => __('Add New Slide', 'sprig'),
		'edit_item' => __('Edit Slide', 'sprig'),
		'new_item' => __('New Slide', 'sprig'),
		'view_item' => __('View Slide', 'sprig'),
		'search_items' => __('Search Slides', 'sprig'),
		'not_found' =>  __('No slides found', 'sprig'),
		'not_found_in_trash' => __('No slides found in Trash', 'sprig'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => 'dashicons-format-gallery',
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'editor', /*, 'author','thumbnail','excerpt','comments'*/)
	);
	register_post_type('slide', $args);
}

add_action('init', 'sprig_add_slides');

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type - Slides */
/*-----------------------------------------------------------------------------------*/

add_image_size('sprig_slide', $width=1140, $height=400, $crop='hard');
