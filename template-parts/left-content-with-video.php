<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : '';
$smallPadding = strpos($options, 'small-padding');
$bannerWider = strpos($options, 'banner--wider');
$title = get_sub_field('title');
$link = get_sub_field('link');
$previewImg = get_sub_field('preview-img');
$videoUrl = get_sub_field('video-url');
$btn = get_sub_field('button');
?>
<section class="banner <?= $bannerWider !== false? 'banner--wider' : ''; ?> <?= $smallPadding !== false? 'banner--small-padding' : ''; ?>">
    <div class="banner__inner">
        <div class="banner__text">
            <?php if($title): ?>
                <h3><?= $title; ?></h3>
            <?php endif; ?>

            <?php if($link): ?>
                <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
            <?php endif; ?>
        </div>
        <?php if($videoUrl || $previewImg): ?>
            <div class="banner__video">
                <?= wp_get_attachment_image($previewImg['id'], [300, 180]); ?>
                <a href="#modal-video" class="banner__trigger video-trigger" data-video-src="<?= $videoUrl; ?>"></a>
            </div>
        <?php endif; ?>
    </div>
    <?php if($btn): ?>
        <a href="<?= $btn['url']; ?>" class="btn btn--orange" target="<?= $btn['target']; ?>"><?= $btn['title']; ?></a>
    <?php endif; ?>
</section>