<?php
$downloadTemplate = get_field('single-article__download-template');
$downloadTemplate = $downloadTemplate ? $downloadTemplate : get_field('single-article__download-template', 'option');
?>
<div class="banner-2">
    <div class="banner-2__row">
        <?php if (is_array($downloadTemplate) && isset($downloadTemplate['title'])) : ?>
            <h3 data-title-download><?= $downloadTemplate['title']; ?></h3>
        <?php endif; ?>
        <div class="banner-2__img">
            <?php if (is_array($downloadTemplate) && isset($downloadTemplate['image']['id'])) : ?>
                <?= wp_get_attachment_image($downloadTemplate['image']['id'], 'full'); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (is_array($downloadTemplate) && isset($downloadTemplate['file-url']) && isset($downloadTemplate['button-text'])) : ?>
        <a href="#modal-content" data-file-url="<?= $downloadTemplate['file-url']; ?>" id="download-trigger" class="btn btn--orange-border">
            <?= $downloadTemplate['button-text']; ?>
        </a>
    <?php endif; ?>
</div>

<div class="convertbox-sidebar">
    <img src="https://brixx.com/wp-content/uploads/2023/03/Model-Forecast-Plan.jpg" alt="Model - Forecast - Plan">
    <a href="https://app.brixx.com/sign-up/trial" class="btn btn--orange" target="">Start free trial</a>
    <!-- <div id="cbox-1UPTgqHS7ODMvRYn"></div> -->
</div>
