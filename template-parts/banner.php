<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : '';
$isHomePage = strpos($options, 'is-homepage');
$isSmallBanner = strpos($options, 'small-banner');
$isLargeText = strpos($options, 'large-text');
$isLargePaddings = strpos($options, 'large-paddings');
$isTwoBtn = strpos($options, 'use-two-btn');
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$content = get_sub_field('content');
$btn = get_sub_field('button');
$img = get_sub_field('image');
?>
<?php if($isHomePage !== false): ?>
    <section class="hero">
        <div class="hero__inner">
            <div class="hero__text">
                <?php if($title): ?>
                    <h1><?= $title; ?></h1>
                <?php endif; ?>

                <?= $content; ?>

                <?php if($btn): ?>
                    <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero__bg">
            <?= wp_get_attachment_image($img['id'], [720, 661], false, ['class' => 'skip-lazy', 'loading' => 'eager'] ); ?>
        </div>
    </section>
<?php else: ?>
    <section class="hero-small <?=  $isLargePaddings? 'hero-small--larger-paddings' : ''; ?> <?= $isLargeText? 'hero-small--larger-text' : ''; ?> <?= $isSmallBanner? 'hero-small--small' : ''; ?>">
        <div class="hero-small__inner">
            <div class="hero-small__text">
                <div class="breadcrumbs">
                    <?php  get_template_part('template-parts/breadcrumbs'); ?>
                </div>

                <?php if($title): ?>
                    <h1><?= $title; ?></h1>
                <?php endif; ?>

                <?= $content; ?>

                <?php if(!$isTwoBtn): ?>
                    <?php if($btn): ?>
                        <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                    <?php endif; ?>
                <?php else:
                    $btnSecond = get_sub_field('button-2');
                ?>
                    <div class="hero-small__btns">
                        <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
                        <a href="<?= $btnSecond['url']; ?>" target="<?= $btnSecond['target']; ?>" class="btn btn--orange"><?= $btnSecond['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero-small__img">
            <?= wp_get_attachment_image($img['id'], [1920, 420], null, ['class' => 'skip-lazy', 'loading' => 'eager']); ?>
        </div>
    </section>
<?php endif; ?>