<?php
get_header();

get_template_part('template-parts/partners/hero-single', null, ['badge' => 'Accounts & advisors directory']);
get_template_part('template-parts/partners/single-content');
//get_template_part('template-parts/partners/related-articles', null, ['button' => ['title' => 'See all articles', 'url' => HOME_URL . '/accounts-advisors/'], 'post_type' => 'accounts-advisors']);
get_template_part('template-parts/start-rocket');

get_footer();
