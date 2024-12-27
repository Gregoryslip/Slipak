<?php
get_header();

$tax = get_queried_object();
$args = [
    'post_type' => 'post',
    'posts_per_page' => 4,
    'tax_query' => [
        [
            'taxonomy' => 'authors',
            'field' => 'term_id',
            'terms' => [$tax->term_id]
        ]
    ]
];
$allPostsLink = HOME_URL . '/blog/';

get_template_part('template-parts/author/banner', null, ['author' => $tax]);
get_template_part('template-parts/author/author-info', null, ['author' => $tax]);
get_template_part('template-parts/related-articles', null, ['args' => $args, 'link' => $allPostsLink]);
get_template_part('template-parts/start-rocket');

get_footer();
