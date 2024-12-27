<?php
$options = get_sub_field('options');
if($options):
    $options = implode(' ', $options);
endif;
$title = get_sub_field('title');
$description = get_sub_field('description');
$columns = get_sub_field('columns');
$btn = get_sub_field('button');
?>
<section class="steps steps--circles <?= $options; ?>">
    <?php if($title): ?>
        <div class="steps__title">
            <h2><?= $title; ?></h2>
            <?php if($description): ?>
                <p><?= $description; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="steps__inner">
        <?php foreach ($columns as $column): ?>
            <div class="steps__item">
                <div class="steps__number">
                    <?= $column['text']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if($btn): ?>
        <div class="steps__foot">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange <?php if (is_front_page()) echo 'split'; ?>"><?= $btn['title']; ?></a>
        </div>
    <?php endif; ?>
</section>