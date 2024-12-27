<?php
$cat = isset($args['cat'])? $args['cat'] : false;
if ($cat){
    $subtitle = get_field('banner__subtitle', $cat);
    $title = get_field('banner__title', $cat);
    $img = get_field('banner__image', $cat);
    $subtitle = $subtitle? $subtitle : '';
    $title = $title? $title : $cat->name;
    $img = $img? $img : get_field('banner__image', 134);

} else {
    $subtitle = get_field('banner__subtitle');
    $title = get_field('banner__title');
    $img = get_field('banner__image');
}
?>
<section class="hero-small hero-small--small">
    <div class="hero-small__inner">
        <div class="hero-small__text">
            <div class="breadcrumbs">
                <?php  get_template_part('template-parts/breadcrumbs'); ?>
            </div>
            <h1><?= $title; ?></h1>
        </div>
    </div>
    <div class="hero-small__img">
        <?= wp_get_attachment_image($img['id'], [1920, 420]); ?>
    </div>
</section>