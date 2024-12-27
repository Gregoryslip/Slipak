<?php
if (have_rows('post-builder')):
    while (have_rows('post-builder')) : the_row();
        get_template_part('template-parts/' . get_row_layout());
    endwhile;
endif;
