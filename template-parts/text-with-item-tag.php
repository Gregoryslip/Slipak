<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : false;
$img = get_sub_field('image');
$title = get_sub_field('title');
$content = get_sub_field('content');
?>
<section class="text-item-with-tag <?= $options; ?>">
    <div class="text-item-with-tag__outer">
        <div class="text-item-with-tag__img">
            <?= wp_get_attachment_image($img['id'], [500, 410]); ?>
        </div>
        <div class="text-item-with-tag__text">
            <div class="text-item-with-tag__wrapper">
                <?php if($title): ?>
                    <h3><?= $title; ?></h3>
                <?php endif; ?>
                <?= $content; ?>
            </div>
        </div>
    </div>
</section>