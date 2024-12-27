<?php
function partnershipLoadMore(){
    $args = isset($_POST['query'])? json_decode(stripslashes($_POST['query']), true) : false;
    $page = isset($_POST['page'])? $_POST['page'] : false;
    $args['paged'] = $page;

    $html = '';
    $query = new WP_Query($args);

    if($query->have_posts()){
        ob_start();
        while ($query->have_posts()): $query->the_post();
            get_template_part('template-parts/partners/article-item');
        endwhile;
        $html = ob_get_contents();
        ob_end_clean();
    }

    echo json_encode([
        'html' => $html,
        '$args' => $args
    ]);

    die;
}
add_action('wp_ajax_partnership_load_more', 'partnershipLoadMore');
add_action('wp_ajax_nopriv_partnership_load_more', 'partnershipLoadMore');


function partnershipFilter(){
    $args = isset($_POST['query'])? json_decode(stripslashes($_POST['query']), true) : false;
    $industry = isset($_POST['industry'])? $_POST['industry'] : false;
    $location = isset($_POST['location'])? $_POST['location'] : false;
    $service = isset($_POST['service'])? $_POST['service'] : false;
    $taxQuery = [
        'relation' => 'AND',
    ];

    if($service){
        $taxQuery[] = [
            'taxonomy' => 'service-type',
            'field' => 'term_id',
            'terms' => [$service]
        ];
    }

    if($location){
        $taxQuery[] = [
            'taxonomy' => 'locations',
            'field' => 'term_id',
            'terms' => [$location]
        ];
    }

    if($industry){
        $taxQuery[] = [
            'taxonomy' => 'industry-experience',
            'field' => 'term_id',
            'terms' => [$industry]
        ];
    }

    $args['tax_query'] = $taxQuery;
    $args['paged'] = 1;

    $query = new WP_Query($args);
    $maxPage = $query->max_num_pages;
    if($query->have_posts()){
        ob_start();
        while ($query->have_posts()): $query->the_post();
            get_template_part('template-parts/partners/article-item');
        endwhile;
        $html = ob_get_contents();
        ob_end_clean();
    } else {
        $html = '<h2>Articles not found</h2>';
    }

    echo json_encode([
        'html' => $html,
        'args' => json_encode($args),
        'max_page' => $maxPage
    ]);

    die;
}
add_action('wp_ajax_partnership_filter', 'partnershipFilter');
add_action('wp_ajax_nopriv_partnership_filter', 'partnershipFilter');