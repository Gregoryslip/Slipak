<?php
function blogLoadMore(){
    $args = isset($_POST['query'])? json_decode(stripslashes($_POST['query']), true) : false;
    $page = isset($_POST['page'])? $_POST['page'] : false;
    $maxPageNewQuery = isset($_POST['maxPageNewQuery'])? $_POST['maxPageNewQuery'] : false;
    $has_appender_template = isset($_POST['has_appender_template'])? $_POST['has_appender_template'] : false;
    $counter = 0;
    $args['paged'] = $page;

    if($has_appender_template){
        if($page > $maxPageNewQuery){
            $args['posts_per_page'] = 6;
            $has_appender_template = false;
        }

        $argsForTemplate = [
            'post_type' => 'post',
            'posts_per_page' => 2,
            'post_status' => 'publish',
            'paged' => $page,
            'cat' => 416
        ];
        $newQuery = new WP_Query($argsForTemplate);
    }

    $html = '';
    $query = new WP_Query($args);

    if($query->have_posts()){
        ob_start();
        while ($query->have_posts()): $query->the_post();
            $counter++;
            get_template_part('template-parts/blog/article-item');
            if($counter === 2 && $has_appender_template){
                while ($newQuery->have_posts()): $newQuery->the_post();
                    get_template_part('template-parts/blog/article-item');
                endwhile;
                wp_reset_query();
            }
        endwhile;
        $html = ob_get_contents();
        ob_end_clean();
    }

    echo json_encode([
        'html' => $html
    ]);

    die;
}
add_action('wp_ajax_blog_load_more', 'blogLoadMore');
add_action('wp_ajax_nopriv_blog_load_more', 'blogLoadMore');