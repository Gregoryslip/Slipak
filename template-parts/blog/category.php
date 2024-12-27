<?php
$category = isset($args['cat'])? $args['cat'] : false;
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    //'posts_per_page' => 6,
    'posts_per_page' => -1,
    'cat' => $category->term_id,
    'orderby' => 'date',
    'order' => 'DESC'
];
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
?>
<section class="archive">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">

    <div class="archive__top">
        <?php
            get_template_part('template-parts/blog/categories-nav', false, ['cat' => $category]);
            get_template_part('template-parts/blog/search-form');
        ?>
    </div>

    <div class="archive__outer">
        <?php if($query->have_posts()): ?>
            <div class="archive__items" data-archive-body>
                <?php
                    while ($query->have_posts()): $query->the_post();
                        get_template_part('template-parts/blog/article-item');
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        <?php endif; ?>

        <?php if($maxPage > 1): ?>
            <div class="archive__foot">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                <a href="#" data-load-more class="btn btn--orange">See more Articles</a>
            </div>
        <?php endif; ?>
    </div>
</section>