<?php
$bg = get_sub_field('bg');
$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
$btn = get_sub_field('button');
?>
<?php if(is_array($items)): ?>
    <section id="accordion" class="accordion">
        <div class="accordion__bg">
            <div class="accordion__bg-wrapper">
                <?= $bg? wp_get_attachment_image($bg['id'], [1920, 930]) : ''; ?>
            </div>
        </div>

        <div class="accordion__title">
            <?php if($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>
            <?= $content; ?>
        </div>

        <div class="accordion__inner">
            <?php foreach ($items as $item):
                $ID = $item->ID;
                $title = get_the_title($ID);
                $content = get_field('faq__content', $ID);
            ?>
                <div class="accordion__item" data-dropdown-status="close" data-working-range="0 9999">
                    <div class="accordion__head" data-dropdown-head>
                        <h3><?= $title; ?></h3>
                        <div class="accordion__icon">
                            <span></span>
                        </div>
                    </div>
                    <div class="accordion__body" data-dropdown-body>
                        <?= $content; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if($btn): ?>
            <div class="accordion__footer">
                <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>