<?php
if (have_rows('page-builder')):
    while (have_rows('page-builder')) : the_row();
        if (get_row_layout() != 'cta') {
            get_template_part('template-parts/' . get_row_layout());
        } else {
            get_template_part('template-parts/start-rocket');
        }

    endwhile;
endif;
