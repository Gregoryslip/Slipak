<?php
$img = get_sub_field('image');
$title = get_sub_field('title');
$description = get_sub_field('description');
$btn = get_sub_field('button');
?>
<section class="cta">
    <div class="cta__inner">
        <div class="cta__img">
            <?= wp_get_attachment_image($img['id'], [324, 216]); ?>
        </div>

        <div class="cta__text">
            <?php if($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>
            <p><?= $description; ?></p>
        </div>

        <?php if($btn): ?>
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn"><?= $btn['title']; ?></a>
        <?php endif; ?>
    </div>
</section>