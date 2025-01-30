<?php
$mainArticle = get_field('blog__main-article');
$popularArticles = get_field('blog__most-popular-articles');
$isArchive = false;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    //'posts_per_page' => 4,
    'posts_per_page' => 10,
    'category__not_in' => 416,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
];

$argsForTemplate = [
    'post_type' => 'post',
    //'posts_per_page' => 2,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'cat' => 416,
    'orderby' => 'date',
    'order' => 'DESC'
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

<div class="archive__top px-[6vw]">
  <?php get_template_part('template-parts/blog/categories-nav', false, ['cat' => '']); ?>
  <div class="hidden lg:flex gap-[10px]">
    <button type="button" class="h-[44px] p-[9px] rounded-sm  bg-white blog-cat__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
    <button type="button" class="h-[44px] p-[9px] rounded-sm  transition-transform hover:scale-105 bg-white blog-cat__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
  </div>
</div>
<section class="archive">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">
    <input type="hidden" name="has_template_appender" value="1">
    <input type="hidden" name="maxPageNewQuery" value="<?= $maxPageNewQuery; ?>">
   


    <div class="archive__outer">
        <?php //get_template_part('template-parts/blog/main-article', false, ['main_article' => $mainArticle, 'popular_articles' => $popularArticles]); ?>
        <?php

        ?>

        <?php if($query->have_posts()): ?>
            <div class="archive__items" data-archive-body>
                <?php
                  $template_post = get_post(21478);
                  $template_title = get_the_title($template_post->ID);
                  $template_title_span = get_field('post__subtitle', $template_post->ID);
                  $template_features = get_field('features', $template_post->ID);
                  $template_button = get_field('post__button', $template_post->ID);

                  $features_array = [];
                  if ($template_features) {
                      foreach ($template_features as $feature) {
                          $features_array[] = $feature['feature']['title'];
                      }
                  }

                  get_template_part('template-parts/blog/template-item', null, [
                    'bg-image' => get_the_post_thumbnail_url($template_post->ID, 'full'),
                    'title' => $template_title,
                    'title_class' => 'text-[#2D3646]',
                    'title_span' => $template_title_span,
                    'title_span_class' => 'text-[#FF4713]',
                    'feature-item' => $features_array,
                    'href' => $template_button['url'],
                  ]);

                  // get_template_part('template-parts/blog/template-item', null, [
                  //   'bg-image' => get_template_directory_uri() . '/assets/image/blog/template1.svg',
                  //   'title' => 'FREE Business Plan',
                  //   'title_class' => 'text-[#2D3646]',
                  //   'title_span' => 'Template',
                  //   'title_span_class' => 'text-[#FF4713]',
                  //   'feature-item' => [
                  //       'Google Docs template',
                  //       'Simple to use',
                  //       'Resources and guides availableTemplate for 12 months',
                  //   ],
                  //   'href' => '#',
                  // ]);


                while ($query->have_posts()): $query->the_post();
                    $counter++;
                    get_template_part('template-parts/blog/article-item');
                    // if($counter === 2){
                    //     while ($newQuery->have_posts()): $newQuery->the_post();
                    //         get_template_part('template-parts/blog/article-item');
                    //     endwhile;
                    //     wp_reset_query();
                    // }
                    // if($counter === 2){
                    //     while ($newQuery->have_posts()): $newQuery->the_post();
                    //         get_template_part('template-parts/blog/article-item');
                    //     endwhile;
                    //     wp_reset_query();
                    // }
                    if($counter === 6){
                      get_template_part('template-parts/blog/template-item', null, [
                        'bg-image' => get_template_directory_uri() . '/assets/image/blog/template2.svg',
                        'title' => 'FREE Profit & Loss',
                        'title_class' => 'text-white',
                        'title_span' => 'Template',
                        'title_span_class' => 'text-white',
                        'subtitle' => 'with examples for spreadsheets',
                        'subtitle_class' => 'text-[#F5D68A]',

                        'feature-item' => [
                            'Google Sheets & Excel',
                            'Automatic formulas',
                            'Template for 12 months',
                        ],
                        'href' => '#',
                      ]);
                    }

                endwhile;
                wp_reset_query();
                ?>
            </div>
        <?php endif; ?>

        <?php if($query->max_num_pages > 1): ?>
            <div class="archive__foot">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                <a id="load-more" data-page="1" data-max="<?php echo $query->max_num_pages; ?>"  href="#" data-load-more class="btn btn--orange">Load more</a>
            </div>
        <?php endif; ?>
    </div>

   <?php  get_template_part('template-parts/blog/features'); ?>
</section>