<?php

// Admin Bar Fix
if ( is_user_logged_in() ) {
   		show_admin_bar(true);
} else {
   		show_admin_bar(false);
}

// Theme Setup
if ( ! function_exists( 'wp_theme_setup' ) ) :
    function wp_theme_setup() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link', 10);
        remove_action('wp_head', 'start_post_rel_link', 10);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10);
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        add_theme_support( 'woocommerce' );

        // Register Menu Location
        register_nav_menus( array(
            'language-menu' => __( 'Language Menu', 'textdomain' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'wp_theme_setup' );

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//DISABLED LAZY LOADING JS AS WP ROCKET PERFORMED BETTER
/*
function alter_att_attributes_wpse_102079($attr) {
    if($attr['class'] !== 'skip-lazy'){
        $attr['data-src'] = $attr['src'];
        $attr['class'] = $attr['class'] . ' lazy';

        unset($attr['src']);
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'alter_att_attributes_wpse_102079');
*/

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{

    if ($post_type === 'post' || $post_type === 'page') return false;
    return $current_status;
}

add_action('init', 'init_remove_support', 100);
function init_remove_support(){
    //remove_post_type_support( 'post', 'editor');
    remove_post_type_support( 'page', 'editor');
}

function wp_time_to_read($post){
    $mycontent = get_field('post-builder', $post)[0]['content'];
    $word = str_word_count(strip_tags($mycontent));
    $m = floor($word / 200);
    return $m;
}

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_filter('user_contactmethods', function($methods) {
    unset($methods['aim'],
        $methods['yim'],
        $methods['jabber'],
        $methods['myspace'],
        $methods['pinterest'],
        $methods['facebook'],
        $methods['instagram'],
        $methods['soundcloud'],
        $methods['tumblr'],
        $methods['youtube'],
        $methods['twitter'],
        $methods['wikipedia'],
        $methods['linkedin'],
    );
    return $methods;
}, 999);

function get_terms_by_cpt( $taxonomies, $args=array() ){
    $args = wp_parse_args($args);
    if( !empty($args['post_types']) ){
        $args['post_types'] = (array) $args['post_types'];

        add_filter( 'terms_clauses','filter_terms_by_cpt',10,3);

        function filter_terms_by_cpt( $pieces, $tax, $args){
            global $wpdb;
            $pieces['fields'] .=", COUNT(*) " ;
            $pieces['join'] .=" INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id 
                                INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id ";
            $post_types_str = "'".implode("','",$args['post_types'])."'";
            $pieces['where'].= $wpdb->prepare("AND p.post_type IN(".$post_types_str.") AND p.post_status IN(%s) GROUP BY t.term_id", 'publish');
            remove_filter( current_filter(), __FUNCTION__ );
            return $pieces;
        }
    }
    return get_terms($taxonomies, $args);
}

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'software-integration' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'software-integration', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );