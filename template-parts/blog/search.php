<?php
$s = isset($_GET['s'])? $_GET['s'] : false;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    's' => $s
];
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
?>
<section class="archive">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">

    <div class="container archive__search-result">
        <h1>Search Results for: <?= $s; ?></h1>
    </div>

    <div class="archive__top">
        <?php
            get_template_part('template-parts/blog/categories-nav', false, ['without_active' => true]);
            get_template_part('template-parts/blog/search-form', false, ['s' => $s]);
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
        <?php else: ?>
            <h2>Articles not found </h2>
        <?php endif; ?>

        <?php if($maxPage > 1): ?>
            <div class="archive__foot">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                <a href="#" data-load-more class="btn btn--orange">See more Articles</a>
            </div>
        <?php endif; ?>
    </div>
</section>