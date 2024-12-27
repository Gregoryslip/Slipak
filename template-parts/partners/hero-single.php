<?php
$title = get_the_title();
$badge = isset($args['badge'])? $args['badge'] : false;
?>
<section class="hero-small  hero-small--small">
    <div class="hero-small__inner">
        <div class="hero-small__text">
            <div class="breadcrumbs">
                <?php  get_template_part('template-parts/breadcrumbs'); ?>
            </div>
            <h1><?= $title; ?></h1>
        </div>
    </div>
    <div class="hero-small__img">
        <img width="1920" height="420" src="<?= THEME_URL; ?>/assets/image/hero/partnership-single.png" alt="background">
    </div>
</section>