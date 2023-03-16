<?php
// Register Custom Post Type Opinion
function create_opinion_cpt() {

	$labels = array(
		'name' => _x( 'مقالات الرأي', 'Post Type General Name', 'news-hsoub' ),
		'singular_name' => _x( 'مقالة رأي', 'Post Type Singular Name', 'news-hsoub' ),
		'menu_name' => _x( 'مقالات الرأي', 'Admin Menu text', 'news-hsoub' ),
		'name_admin_bar' => _x( 'opinion', 'Add New on Toolbar', 'news-hsoub' ),
		'archives' => __( 'opinion Archives', 'news-hsoub' ),
		'attributes' => __( 'opinion Attributes', 'news-hsoub' ),
		'parent_item_colon' => __( 'Parent Opinion:', 'news-hsoub' ),
		'all_items' => __( 'جميع مقالات الرأي', 'news-hsoub' ),
		'add_new_item' => __( 'إضافة رأي جديد', 'news-hsoub' ),
		'add_new' => __( 'إضافة رأي جديد', 'news-hsoub' ),
		'new_item' => __( 'New Opinion', 'news-hsoub' ),
		'edit_item' => __( 'تعديل الرأي', 'news-hsoub' ),
		'update_item' => __( 'تعديل', 'news-hsoub' ),
		'view_item' => __( 'عرض مقال الرأي', 'news-hsoub' ),
		'view_items' => __( 'عرض مقالات الرأي', 'news-hsoub' ),
		'search_items' => __( 'البحث عن مقالة رأي', 'news-hsoub' ),
		'not_found' => __( 'غير موجود', 'news-hsoub' ),
		'not_found_in_trash' => __( 'غير موجود في سلة المحذوفات', 'news-hsoub' ),
		'featured_image' => __( 'الصورة البارزة', 'news-hsoub' ),
		'set_featured_image' => __( 'اختيار صورة بارزة', 'news-hsoub' ),
		'remove_featured_image' => __( 'حذف الصورة البارزة', 'news-hsoub' ),
		'use_featured_image' => __( 'اختيار صورة بارزة', 'news-hsoub' ),
		'insert_into_item' => __( 'إضافة إلى مقالات الرأي', 'news-hsoub' ),
		'uploaded_to_this_item' => __( 'رفع إلى مقال الرأي هذا', 'news-hsoub' ),
		'items_list' => __( 'قائمة الآراء', 'news-hsoub' ),
		'items_list_navigation' => __( 'مقالات الرأي في شريط التنقل', 'news-hsoub' ),
		'filter_items_list' => __( 'تصفية مقالات الرأي', 'news-hsoub' ),
	);
	$args = array(
		'label' => __('opinion'),
		'description' => __( 'إضافة مقالات رأي للموقع' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book-alt',
		'supports' => array('title', 'editor', 'thumbnail', 'author', 'comments'),
		// 'taxonomies'  => array( 'category' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
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
	
	register_post_type( 'opinion', $args );

}
add_action( 'init', 'create_opinion_cpt');

