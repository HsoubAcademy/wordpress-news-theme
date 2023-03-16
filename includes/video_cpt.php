<?php

function create_video_cpt() {

	$labels = array(
		'name' => _x( 'مقاطع الفيديو', 'Post Type General Name', 'news-hsoub' ), 
		'singular_name' => _x( 'مقطع فيديو', 'Post Type Singular Name', 'news-hsoub' ), 
		'menu_name' => _x( 'مقاطع الفيديو', 'Admin Menu text', 'news-hsoub' ),
		'name_admin_bar' => _x( 'video', 'Add New on Toolbar', 'news-hsoub' ),
		'archives' => __( 'video Archives', 'news-hsoub' ),
		'attributes' => __( 'video Attributes', 'news-hsoub' ),
		'parent_item_colon' => __( 'Parent video:', 'news-hsoub' ),
		'all_items' => __( 'جميع مقاطع الفيديو', 'news-hsoub' ), 
		'add_new_item' => __( 'إضافة فيديو جديد', 'news-hsoub' ),
		'add_new' => __( 'إضافة فيديو جديد', 'news-hsoub' ), 
		'new_item' => __( 'New video', 'news-hsoub' ),
		'edit_item' => __( 'تعديل الفيديو', 'news-hsoub' ),
		'update_item' => __( 'تعديل', 'news-hsoub' ),
		'view_item' => __( 'عرض الفيديو', 'news-hsoub' ),
		'view_items' => __( 'عرض مقاطع الفيديو', 'news-hsoub' ),
		'search_items' => __( 'البحث عن مقطع فيديو', 'news-hsoub' ),
		'not_found' => __( 'غير موجود', 'news-hsoub' ),
		'not_found_in_trash' => __( 'غير موجود في سلة المحذوفات', 'news-hsoub' ),
		'featured_image' => __( 'الصورة البارزة', 'news-hsoub' ),
		'set_featured_image' => __( 'اختيار صورة بارزة', 'news-hsoub' ),
		'remove_featured_image' => __( 'حذف الصورة البارزة', 'news-hsoub' ),
		'use_featured_image' => __( 'اختيار صورة بارزة', 'news-hsoub' ),
		'insert_into_item' => __( 'إضافة إلى مقاطع الفيديو', 'news-hsoub' ),
		'uploaded_to_this_item' => __( 'رفع إلى مقطع الفيديو هذا', 'news-hsoub' ),
		'items_list' => __( 'قائمة الآراء', 'news-hsoub' ),
		'items_list_navigation' => __( 'مقاطع الفيديو في شريط التنقل', 'news-hsoub' ),
		'filter_items_list' => __( 'تصفية مقاطع الفيديو', 'news-hsoub' ),
	);
	$args = array(
		'label' => __('video'),
		'description' => __( 'إضافة مقالات فيديو للموقع' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-video',
		'supports' => array('title', 'editor', 'thumbnail', 'comments'),
		'taxonomies'  => array( 'category' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	
	register_post_type( 'video', $args );

}
add_action( 'init', 'create_video_cpt');

