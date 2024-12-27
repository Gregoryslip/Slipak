<?php
$mainArticle = get_field('blog__main-article');
$popularArticles = get_field('blog__most-popular-articles');
$isArchive = false;

// Adjusted to query 'brixx_news' post type
$args = [
    'post_type' => 'brixx_news', // Changed to 'brixx_news'
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => 416
];

// Adjusted to query 'brixx_news' post type
$argsForTemplate = [
    'post_type' => 'brixx_news', // Changed to 'brixx_news'
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'cat' => 416
];

if($mainArticle){
    $isArchive = true;
    $args['post__not_in'] = [$mainArticle->ID];
}

$newQuery = new WP_Query($argsForTemplate);
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
$maxPageNewQuery = $newQuery->max_num_pages;
$counter = 0;
?>
<section class="archive">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">
    <input type="hidden" name="has_template_appender" value="1">
    <input type="hidden" name="maxPageNewQuery" value="<?= $maxPageNewQuery; ?>">

    <!--<div class="archive__top">
        <?php
            //get_template_part('template-parts/blog/categories-nav', false, ['cat' => '']);
            //get_template_part('template-parts/blog/search-form');
        ?>
    </div>-->

    <div class="archive__outer">
        <?php //get_template_part('template-parts/blog/main-article', false, ['main_article' => $mainArticle, 'popular_articles' => $popularArticles]); ?>

        <?php if($query->have_posts()): ?>
            <div class="archive__items" data-archive-body>
                <?php
                while ($query->have_posts()): $query->the_post();
                    $counter++;
                    get_template_part('template-parts/blog/article-item');
                    if($counter === 2){
                        while ($newQuery->have_posts()): $newQuery->the_post();
                            get_template_part('template-parts/blog/article-item');
                        endwhile;
                        wp_reset_query();
                    }
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
