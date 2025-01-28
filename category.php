<?php
get_header(null, ['param' => 'bg-white']);
$category = get_category( get_query_var( 'cat' ) );

get_template_part('template-parts/blog/banner', false, ['cat' => $category]);
get_template_part('template-parts/blog/category', false, ['cat' => $category]);

get_footer();