<?php
$banner = get_field('single-article__banner', 'option');
?>
<section class="hero-small hero-small--article">
    <div class="hero-small__inner">
        <div class="hero-small__text">
            <div class="breadcrumbs">
                <?php  get_template_part('template-parts/breadcrumbs'); ?>
            </div>
        </div>
        <?php get_template_part('template-parts/blog/search-form'); ?>
    </div>
</section>