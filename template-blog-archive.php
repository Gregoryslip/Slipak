<?php
//Template Name: Blog Archive

// get_header();
get_template_part('header', null, ['param' => 'bg-white']);
get_template_part('template-parts/blog/banner');
get_template_part('template-parts/blog/archive');

get_footer();