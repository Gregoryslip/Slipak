<?php
get_header();

get_template_part('template-parts/partners/hero-single', null, ['badge' => 'Business services directory']);
get_template_part('template-parts/partners/single-content');
//get_template_part('template-parts/partners/related-articles', null, ['button' => ['title' => 'See all articles', 'url' => HOME_URL . '/business-services/'], 'post_type' => 'business-services']);
get_template_part('template-parts/start-rocket');

get_footer();
