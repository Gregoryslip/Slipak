<?php
$items = get_sub_field('items');
$cta = get_sub_field('cta');
?>
<section class="grid-with-items grid-with-items--light-bg">
    <?php if($items): ?>
        <div class="grid-with-items__inner">
            <?php foreach ($items as $item):
                $icon = $item['icon'];
                $title = $item['title'];
                $description = $item['description'];
                $link = $item['button'];
            ?>
                <div class="grid-with-items__item">
                    <div class="grid-with-items__icon">
                        <?= wp_get_attachment_image($icon['id'], [48, 41], null, ['class' => 'skip-lazy']); ?>
                    </div>
                    <div class="grid-with-items__text">
                        <h4><?= $title; ?></h4>
                        <p><?= $description; ?></p>
                        <?php if($link): ?>
                            <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if($cta['title']): ?>
        <div class="grid-with-items__box">
            <div class="grid-with-items__box-text">
                <h4><?= $cta['title']; ?></h4>
                <p><?= $cta['description']; ?></p>
            </div>

            <?php if($cta['button']): ?>
                <div class="grid-with-items__box-btn">
                    <a href="<?= $cta['button']['url']; ?>" class="btn btn--orange-border" target="<?= $cta['button']['target']; ?>"><?= $cta['button']['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>