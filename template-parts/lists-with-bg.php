<?php
$bg = get_sub_field('bg');
$items = get_sub_field('items');
$btn = get_sub_field('button');
?>
<section class="lists-with-bg">
    <div class="lists-with-bg__bg">
        <?= wp_get_attachment_image($bg['id'], [1920, 725]); ?>
    </div>
    <?php if(is_array($items) && count($items) > 1):  ?>
        <div class="lists-with-bg__inner">
            <?php foreach ($items as $item):
                $title = $item['title'];
                $content = $item['content'];
            ?>
                <div class="lists-with-bg__item">
                    <?php if($title): ?>
                        <h2><?= $title; ?></h2>
                    <?php endif; ?>
                    <?= $content; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if($btn): ?>
        <div class="lists-with-bg__foot">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
        </div>
    <?php endif; ?>
</section>