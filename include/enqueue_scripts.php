<?php

/**
 * Enqueue scripts and styles.
 */
function enqueue_scripts()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('global-styles');

    $theme_url = get_template_directory_uri();
    $ver = '1.3.0';
    // wp_enqueue_script('tw', 'https://cdn.tailwindcss.com', false, null, false);
    // wp_enqueue_style('style', $theme_url . '/style.css', array(), $ver);
    wp_enqueue_style('style', $theme_url . '/tw-override.css', array(), $ver);
    wp_enqueue_style('customizing', $theme_url . '/customizing.css', array('style'), $ver);



    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, null, true);
    wp_enqueue_script('jquery');

    wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css');
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.13.3/jquery-ui.js');
    wp_enqueue_script('jquery-ui-touch-punch', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', array('jquery-ui'), null, true);

    wp_enqueue_script('js',      $theme_url . '/assets/js/main.js',    array('jquery'), $ver, true);
    wp_enqueue_script('custom-js',      $theme_url . '/assets/js/customize.js',    array('js'), $ver, true);
    if (is_single()) {
      wp_enqueue_script('single-js',      $theme_url . '/assets/js/single.js',    array('js'), $ver, true);
    }
    wp_enqueue_script('pricing', $theme_url . '/assets/js/pricing.js', array('jquery'), $ver, true);
    wp_enqueue_style('pricing',  $theme_url . '/assets/css/pricing.css', array(),       $ver);
    //wp_enqueue_style('menu',  $theme_url . '/menu.css', array(),       $ver);
    wp_enqueue_script('menu',  $theme_url . '/menu.js', array(), array('jquery'), $ver, true);

    wp_localize_script(
        'js',
        'customjs_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'site_url' => get_site_url(),
            'theme_url' => $theme_url
        )
    );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


add_filter('script_loader_tag', function ($tag, $handle) {
    if (!is_admin()) {
        if ('jquery' === $handle)
            return $tag;

        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 2);

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 * ADDED BY ASC 060523
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});
