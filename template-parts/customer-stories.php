<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$btn = get_sub_field('btn');
$stories = get_sub_field('stories');
?>
<section class="articles articles--3-col articles--left-text">
    <div class="articles__title">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>
        <?php if($description): ?>
            <p><?= $description; ?></p>
        <?php endif; ?>
    </div>
    <?php if($stories): ?>
    <div class="articles__inner">
        <?php foreach($stories as $story):
                $title = get_field('customer-story__title', $story);
                $img = get_the_post_thumbnail($story);
                $description = get_field('customer-story__description', $story);
                $author = get_field('customer-story__author', $story);
            ?>
            <div class="customer-story">
                <div class="customer-story__img">
                    <?= $img; ?>
                </div>
                <h3><?= $title; ?></h3>
                <p><?= $description; ?></p>
                <p class="cs-author"><strong><?= $author; ?></strong></p>
                <a href="<?= get_the_permalink($story); ?>">Read the full case study</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
        <?php if($btn): ?>
            <div class="articles__title">
                <div class="footer__info">
                    <?php if($btn): ?>
                        <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
</section>