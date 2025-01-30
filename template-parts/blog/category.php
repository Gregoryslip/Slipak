<?php
$category = isset($args['cat'])? $args['cat'] : false;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    //'posts_per_page' => 6,
    'posts_per_page' => 12,
    'cat' => $category->term_id,
    'orderby' => 'date',
    'order' => 'DESC',
    'pages' => $paged
];
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
?>
<div class="archive__top max-w-[1400px] px-[20px] mx-auto">
  <?php get_template_part('template-parts/blog/categories-nav', false, ['cat' => $category]); ?>
  <div class="hidden lg:flex gap-[10px]">
    <button type="button" class="h-[44px] p-[9px] rounded-sm  bg-white blog-cat__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
    <button type="button" class="h-[44px] p-[9px] rounded-sm  transition-transform hover:scale-105 bg-white blog-cat__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
  </div>
</div>
<section class="bg-[#F7F9FA] py-[60px] px-0">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">

    

    <div class="max-w-[1400px] px-[20px] mx-auto">
        <?php if($query->have_posts()): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[20px]" data-archive-body>
                <?php
                    while ($query->have_posts()): $query->the_post();
                        get_template_part('template-parts/blog/article-item');
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        <?php endif; ?>

        <?php if($query->max_num_pages > 1): ?>
            <div class="archive__foot">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                <a href="#" data-load-more class="btn btn--orange">See more Articles</a>
            </div>
        <?php endif; ?>
    </div>
</section>