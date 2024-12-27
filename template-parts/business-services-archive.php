<?php
$args = [
    'post_type' => 'business-services',
    'posts_per_page' => 6,
    'post_status' => 'publish'
];
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
?>
<?php get_template_part('template-parts/partners/search-bar', null, ['post_type' => 'business-services']); ?>

<section class="grid-of-advisors">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">

    <div class="grid-of-advisors__grid" data-archive-body>
        <?php
        if($query->have_posts()):
            while ($query->have_posts()): $query->the_post();
                get_template_part('template-parts/partners/article-item');
            endwhile;
            wp_reset_query();
        else:
            echo '<h2>Articles not found</h2>';
        endif;
        ?>
    </div>
    <?php if($maxPage > 1): ?>
        <div class="grid-of-advisors__foot">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            <a href="#" data-load-more-partnership class="btn btn--orange-border">Load more</a>
        </div>
    <?php endif; ?>
</section>
