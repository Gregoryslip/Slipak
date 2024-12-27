<?php
$title = get_the_title();
$link = get_the_permalink();
$thumbnailID = get_post_thumbnail_id();
$excerpt = get_the_excerpt();
?>
<div class="grid-of-advisors__item">
    <a href="<?= $link; ?>" class="grid-of-advisors__logo">
        <?= wp_get_attachment_image($thumbnailID, 'full'); ?>
    </a>
    <div class="grid-of-advisors__content">
        <h5><?= $title; ?></h5>
        <p><?= $excerpt; ?></p>
        <?php if($link): ?>
            <div class="grid-of-advisors__btn">
                <a href="<?= $link; ?>">Find out  more</a>
            </div>
        <?php endif; ?>
    </div>
</div>