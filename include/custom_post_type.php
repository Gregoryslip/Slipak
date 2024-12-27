<?php
add_action('init', 'init_custom_post_type');
function init_custom_post_type(){
    register_post_type('faq', array(
        'labels'             => array(
            'name'               => 'FAQ',
            'singular_name'      => 'FAQ',
            'add_new'            => 'Add faq item',
            'add_new_item'       => 'Add faq item',
            'edit_item'          => 'Edit faq item',
            'new_item'           => 'New faq item',
            'view_item'          => 'View faq item',
            'search_items'       => 'Find faq items',
            'not_found'          =>  'FAQ items not found',
            'not_found_in_trash' => 'FAQ items not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'FAQ'
        ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'menu_icon' => 'dashicons-editor-help',
        'rewrite'            => true,
        'capability_type'    => 'post',
        'show_in_rest' => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ) );

    register_post_type('pricing', array(
        'labels'             => array(
            'name'               => 'Pricing',
            'singular_name'      => 'Pricing',
            'add_new'            => 'Add pricing item',
            'add_new_item'       => 'Add pricing item',
            'edit_item'          => 'Edit pricing item',
            'new_item'           => 'New pricing item',
            'view_item'          => 'View pricing item',
            'search_items'       => 'Find pricing items',
            'not_found'          =>  'Pricing items not found',
            'not_found_in_trash' => 'Pricing items not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Pricing'
        ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon' => 'dashicons-money-alt',
        'query_var'          => false,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'show_in_rest' => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ) );

    register_post_type('accounts-advisors', array(
        'labels'             => array(
            'name'               => 'Accountants & Advisors',
            'singular_name'      => 'Accountants & Advisors',
            'add_new'            => 'Add article',
            'add_new_item'       => 'Add article',
            'edit_item'          => 'Edit article',
            'new_item'           => 'New article',
            'view_item'          => 'View article',
            'search_items'       => 'Find article',
            'not_found'          =>  'Articles not found',
            'not_found_in_trash' => 'Articles not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Accountants & Advisors'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon' => 'dashicons-universal-access',
        'query_var'          => true,
        //'rewrite' => array('slug' => 'partnership-directory/accountants-advisors'),
		'rewrite' => array('slug' => 'brixx-partnerships/accountants-advisors'),
        'capability_type'    => 'post',
        'show_in_rest' => false,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'excerpt')
    ) );

//    register_post_type('business-services', array(
//        'labels'             => array(
//            'name'               => 'Business Services',
//            'singular_name'      => 'Business Services',
//            'add_new'            => 'Add article',
//            'add_new_item'       => 'Add article',
//           'edit_item'          => 'Edit article',
//            'new_item'           => 'New article',
//            'view_item'          => 'View article',
//            'search_items'       => 'Find article',
//            'not_found'          =>  'Articles not found',
//            'not_found_in_trash' => 'Articles not found in trash',
//            'parent_item_colon'  => '',
//            'menu_name'          => 'Business Services'
//        ),
//        'public'             => true,
//        'publicly_queryable' => true,
//        'show_ui'            => true,
//        'show_in_menu'       => true,
//        'menu_icon' => 'dashicons-cloud',
//        'query_var'          => true,
//        'rewrite' => array('slug' => 'partnership-directory/business-services'),
//       'capability_type'    => 'post',
//        'show_in_rest' => false,
//        'has_archive'        => false,
//        'hierarchical'       => false,
//        'menu_position'      => null,
//        'supports'           => array('title', 'thumbnail', 'excerpt')
//    ) );

    register_post_type('software-integration', array(
        'labels'             => array(
            'name'               => 'Software Integrations',
            'singular_name'      => 'Software Integrations',
            'add_new'            => 'Add article',
            'add_new_item'       => 'Add article',
            'edit_item'          => 'Edit article',
            'new_item'           => 'New article',
            'view_item'          => 'View article',
            'search_items'       => 'Find article',
            'not_found'          =>  'Articles not found',
            'not_found_in_trash' => 'Articles not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Software Integrations'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon' => 'dashicons-grid-view',
        'query_var'          => true,
        //'rewrite' => array('slug' => 'partnership-directory/software-integrations'),
		'rewrite' => array('slug' => 'resources/software-integrations'),
        'capability_type'    => 'post',
        'show_in_rest' => false,
        'has_archive'        => false,
		//'hierarchical'       => false,
        'hierarchical'       => true,
        //'supports'           => array('title', 'thumbnail', 'excerpt')
		'supports'           => array('title', 'thumbnail', 'excerpt', 'page-attributes')
    ) );
	
    register_post_type('help-centre', array(
        'labels'             => array(
            'name'               => 'Help Centre',
            'singular_name'      => 'Help Centre',
            'add_new'            => 'Add article',
            'add_new_item'       => 'Add article',
            'edit_item'          => 'Edit article',
            'new_item'           => 'New article',
            'view_item'          => 'View article',
            'search_items'       => 'Find article',
            'not_found'          =>  'Articles not found',
            'not_found_in_trash' => 'Articles not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Help Centre'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon' => 'dashicons-format-status',
        'query_var'          => true,
        'rewrite' => array('slug' => 'resources/help-centre'),
        'capability_type'    => 'post',
        'show_in_rest' => false,
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array('title', 'thumbnail', 'excerpt')
    ) );
	
	register_post_type('brixx_news', array(
		'labels'             => array(
			'name'               => 'Brixx News',
			'singular_name'      => 'Brixx News Article',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Article',
			'edit_item'          => 'Edit Article',
			'new_item'           => 'New Article',
			'view_item'          => 'View Article',
			'search_items'       => 'Search Articles',
			'not_found'          => 'No articles found',
			'not_found_in_trash' => 'No articles found in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Brixx News'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'brixx-news'),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-megaphone',
		'supports'           => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
		'show_in_rest'       => false,
	));

    register_taxonomy( 'help-centre-categories', ['help-centre'], [
        'label'        => __( 'Help Centre Categories', 'textdomain' ),
        'public'       => false,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ]);

    register_taxonomy( 'authors', 'post', [
        'label'        => __( 'Authors', 'textdomain' ),
        'public'       => true,
        'rewrite'      => ['slug' => 'authors'],
        'hierarchical' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ]);

//    register_taxonomy( 'locations', ['accounts-advisors', 'business-services'], [
	register_taxonomy( 'locations', ['accounts-advisors'], [
        'label'        => __( 'Locations', 'textdomain' ),
        'public'       => false,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ]);
//    register_taxonomy( 'industry-experience', ['accounts-advisors', 'business-services'], [
    register_taxonomy( 'industry-experience', ['accounts-advisors'], [
        'label'        => __( 'Industry Experience', 'textdomain' ),
        'public'       => false,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ]);
//    register_taxonomy( 'service-type', ['accounts-advisors', 'business-services'], [
    register_taxonomy( 'service-type', ['accounts-advisors'], [
        'label'        => __( 'Services Type', 'textdomain' ),
        'public'       => false,
        'rewrite'      => false,
        'hierarchical' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
    ]);
}