<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : '';
$leftText = strpos($options, 'left-text');
$title = get_sub_field('title');
$items = get_sub_field('items');
$btn = get_sub_field('button');
?>
<section class="grid-with-items <?= $leftText !== false? 'grid-with-items--text-left' : ''; ?>">
    <?php if($title): ?>
        <h2><?= $title; ?></h2>
    <?php endif; ?>
    <?php if(count($items)): ?>
        <div class="grid-with-items__inner">
            <?php foreach ($items as $item):
                $svgIcon = $item['icon'];
                $img = $item['image'];
            ?>
                <div class="grid-with-items__item">
                    <div class="grid-with-items__icon">
                        <?php if($svgIcon): ?>
                            <?= $svgIcon; ?>
                        <?php endif; ?>

                        <?php if($img): ?>
                            <?= wp_get_attachment_image($img['id'], [48, 41]); ?>
                        <?php endif; ?>
                    </div>
                    <div class="grid-with-items__text">
                        <h4><?= $item['title']; ?></h4>
                        <h5><?= $item['description']; ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if($btn): ?>
        <div class="grid-with-items__footer">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
        </div>
    <?php endif; ?>
</section>