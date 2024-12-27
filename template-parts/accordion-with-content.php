<?php
$bg = get_sub_field('bg');
$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
$btn = get_sub_field('button');
?>
<?php if(is_array($items)): ?>
    <section id="accordion" class="accordion accordion-with-content">
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
                $title = $item['title'];
                $text = $item['text'];
                $link = $item['link'];
                $previewImg = $item['image'];
                $videoUrl = $item['video_url'];
            ?>
                <div class="accordion__item" data-dropdown-status="close" data-working-range="0 9999">
                    <div class="accordion__head" data-dropdown-head>
                        <?= $title; ?>
                        <div class="accordion__icon">
                            <span></span>
                        </div>
                    </div>
                    <div class="accordion__body" data-dropdown-body>
                        <section class="banner banner--small-padding">
                            <div class="banner__inner">
                                <div class="banner__text">
                                    <?php if($text): ?>
                                        <h3><?= $text; ?></h3>
                                    <?php endif; ?>

                                    <?php if($link): ?>
                                        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php if($videoUrl || $previewImg): ?>
                                    <div class="banner__video">
                                        <?= wp_get_attachment_image($previewImg['id'], [300, 180]); ?>
                                        <a href="#modal-video" class="banner__trigger video-trigger" data-video-src="<?= $videoUrl; ?>"></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
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