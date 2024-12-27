<?php
$title = get_sub_field('title');
$items = get_sub_field('items');
$override_link = get_sub_field('override_link_styling');
$counter = 0;
?>
<section class="vice-versa-items">
    <div class="vice-versa-items__bg">
<!--            <img class="lazy" width="1920" height="400" data-src="--><?//= THEME_URL; ?><!--/assets/image/backgrounds/steps-bg.png" alt="background">-->
    </div>
    <div class="vice-versa-items__outer">
        <?php if($title): ?>
            <div class="vice-versa-items__title">
                <h2><?= $title; ?></h2>
            </div>
        <?php endif; ?>
        <?php if(is_array($items) && count($items) > 1): ?>
            <div class="text-with-img-2">
                <?php foreach ($items as $item):
                    $title = $item['title'];
                    $img = $item['image'];
                    $content = $item['content'];
                    $link = $item['link'];
					$cta = $item['cta'];
                    $counter++;
                ?>
                    <div class="text-with-img-2__item <?= $counter%2 !== 0? 'text-with-img-2__item--reverce' : ''; ?> ">
                        <div <?php if ($override_link): ?>id="override-links"<?php endif; ?> class="text-with-img-2__text">
                            <?php if($title): ?>
                                <h2><?= $title; ?></h2>
                            <?php endif; ?>
                            <?= $content; ?>
                            <?php if($link): ?>
                                <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                            <?php endif; ?>
                            <?php if($cta): ?>
                                <a class="btn btn--orange" href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>"><?= $cta['title']; ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="text-with-img-2__img">
                            <?= wp_get_attachment_image($img['id'], 'full'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>