<?php
$options = get_sub_field('options');
$bg = get_sub_field('bg');
$title = get_sub_field('title');
$items = get_sub_field('items');
$btn = get_sub_field('button');
?>
<section class="items-with-bg <?= $options; ?>">
    <div class="items-with-bg__bg">
        <?= wp_get_attachment_image($bg['id'], [1920, 580]); ?>
    </div>
    <div class="items-with-bg__outer">
        <?php if($title): ?>
            <div class="items-with-bg__title">
                <h2><?= $title; ?></h2>
            </div>
        <?php endif; ?>

        <?php if(count($items)): ?>
            <div class="items-with-bg__inner">
                <?php foreach ($items as $item): ?>
                    <div class="items-with-bg__item">
                        <div class="items-with-bg__icon">
                            <?= wp_get_attachment_image($item['icon']['id'], [60, 52]); ?>
                        </div>
                        <div class="items-with-bg__text">
                            <h3><?= $item['title']; ?></h3>
                            <p><?= $item['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if($btn): ?>
            <div class="items-with-bg__foot">
                <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>