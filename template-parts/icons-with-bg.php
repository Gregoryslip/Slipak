<?php
$bg = get_sub_field('background');
$title = get_sub_field('title');
$items = get_sub_field('items');
?>
<section class="icons-with-bg">
    <div class="icons-with-bg__bg">
        <?= wp_get_attachment_image($bg['id'], [1920, 382]); ?>
    </div>
    <div class="icons-with-bg__inner">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <?php if(count($items)): ?>
            <div class="icons-with-bg__wrapper">
                <?php foreach ($items as $item): ?>
                    <div class="icons-with-bg__item">
                        <div class="icons-with-bg__icon">
                            <?= $item['icon']; ?>
                        </div>
                        <h4><?= $item['title']; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>