<?php
$s = isset($_GET['s'])? $_GET['s'] : false;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 16,
    'post_status' => 'publish',
    's' => $s
];
$query = new WP_Query($args);
$maxPage = $query->max_num_pages;
?>

<div class="container archive__search-result px-[6vw]">
        <h1>Search Results for: <?= $s; ?></h1>
    </div>

 
          <?php  get_template_part('template-parts/blog/search-form', false, ['s' => $s]); ?>
      
    <div class="archive__top px-[6vw]">

        
        <?php get_template_part('template-parts/blog/categories-nav', false, ['cat' => $category]); ?>
        <div class="hidden lg:flex gap-[10px]">
          <button type="button" class="h-[44px] p-[9px] rounded-sm  bg-white blog-cat__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
          <button type="button" class="h-[44px] p-[9px] rounded-sm  transition-transform hover:scale-105 bg-white blog-cat__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
        </div>

    
    </div>

<section class="archive">
    <input type="hidden" name="query" value='<?= json_encode($args); ?>'>
    <input type="hidden" name="maxPage" value="<?= $maxPage; ?>">

    

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