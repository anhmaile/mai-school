<?php 
// Register CPT
function fwd_register_custom_post_types(){
    // Register Staff CPT
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name'  ),
        'singular_name'      => _x( 'Staff', 'post type singular name'  ),
        'menu_name'          => _x( 'Staff', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff'  ),
        'all_items'          => __( 'All Staff' ),
        'search_items'       => __( 'Search Staff' ),
        'parent_item_colon'  => __( 'Parent Staff:' ),
        'not_found'          => __( 'No Staff found.' ),
        'not_found_in_trash' => __( 'No Staff found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title' ),
        'template'           => array( array( 'core/paragraph' ) ),
        'template_lock'      => 'all'
    );
    
    register_post_type( 'fwd-staff', $args );

    // Register Student CPT
    $labels = array(
        'name'               => _x( 'Student', 'post type general name'  ),
        'singular_name'      => _x( 'Student', 'post type singular name'  ),
        'menu_name'          => _x( 'Student', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student'  ),
        'all_items'          => __( 'All Student' ),
        'search_items'       => __( 'Search Student' ),
        'parent_item_colon'  => __( 'Parent Student:' ),
        'not_found'          => __( 'No Student found.' ),
        'not_found_in_trash' => __( 'No Student found in Trash.' ),
        'archives'           => __( 'Student Archives'),
        'insert_into_item'   => __( 'Insert into Student'),
        'uploaded_to_this_item' => __( 'Uploaded to this Student'),
        'filter_item_list'   => __( 'Filter Student list'),
        'items_list_navigation' => __( 'Student list navigation'),
        'items_list'         => __( 'Student list'),
        'featured_image'     => __( 'Student featured image'),
        'set_featured_image' => __( 'Set Student featured image'),
        'remove_featured_image' => __( 'Remove Student featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template'           => array( array( 'core/paragraph' ), array('core/buttons') ),
        'template_lock'      => 'all'
    );
    
    register_post_type( 'fwd-student', $args );
}
add_action( 'init', 'fwd_register_custom_post_types' );

// Register Taxonomy 
function fwd_register_taxonomies() {
    // Staff Taxonomy
    $labels = array(
        'name'              => _x( 'Staff', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff' ),
        'all_items'         => __( 'All Staff' ),
        'parent_item'       => __( 'Parent Staff' ),
        'parent_item_colon' => __( 'Parent Staff:' ),
        'edit_item'         => __( 'Edit Staff' ),
        'update_item'       => __( 'Update Staff' ),
        'add_new_item'      => __( 'Add New Staff' ),
        'new_item_name'     => __( 'New Work Staff' ),
        'menu_name'         => __( 'Staff-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );

    // Student Taxonomy
    $labels = array(
        'name'              => _x( 'Student', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student' ),
        'all_items'         => __( 'All Student' ),
        'parent_item'       => __( 'Parent Student' ),
        'parent_item_colon' => __( 'Parent Student:' ),
        'edit_item'         => __( 'Edit Student' ),
        'update_item'       => __( 'Update Student' ),
        'add_new_item'      => __( 'Add New Student' ),
        'new_item_name'     => __( 'New Work Student' ),
        'menu_name'         => __( 'Student-categories' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );
}
add_action( 'init', 'fwd_register_taxonomies');

// This flushes the permalinks when the theem is changed
function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );