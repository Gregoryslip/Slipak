<?php
$ID = get_the_ID();
$post = get_post();
$title = get_the_title();
$thumbnailID = get_post_thumbnail_id();
$link = get_the_permalink();
$excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
$cats = get_the_category($ID);
//$date = get_the_date('j F Y', $ID);
//MODIFIED DATE OVERRIDE
$date = get_the_modified_date('j F Y', $ID);
$isTemplate = array_search(416, array_column($cats, 'term_id'));
if($isTemplate !== false){
    $subTitle = get_field('post__subtitle');
    $btn = get_field('post__button');
    if($btn){
        $link = $btn['url'];
    }
}
?>
<div class="archive-card <?= $isTemplate !== false? 'archive-card__template' : ''; ?>">
    <a href="<?= $link; ?>" class="archive-card__img">
        <?= wp_get_attachment_image($thumbnailID, [360, 185]); ?>
    </a>
    <div class="archive-card__outer">
        <div class="archive-card__inner">
            <div class="archive-card__top">
                <?php if($isTemplate !== false): ?>
                    <?php if($subTitle): ?>
                        <div class="archive-card__part">
                            <span><?= $subTitle; ?></span>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="archive-card__time">
                        <?= wp_time_to_read($post); ?> min read
                    </div>
                    <div class="archive-card__date">
                        <?= $date; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="archive-card__text">
                <a href="<?= $link; ?>"><h3><?= $title; ?></h3></a>
                <p><?= $excerpt; ?></p>
            </div>
        </div>
        <div class="archive-card__foot">
            <?php if($isTemplate === false): ?>
                <a href="<?= $link; ?>" class="link">Read more</a>
            <?php else: ?>
                <?php if($btn): ?>
                    <a href="<?= $btn['url']; ?>" class="btn btn--orange-border" target="<?= $btn['target']; ?>"><?= $btn['title']; ?></a>
                <?php else: ?>
                    <a href="<?= $link; ?>" class="btn btn--orange-border">Download Template</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>