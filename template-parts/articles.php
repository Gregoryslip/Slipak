<?php
$title = get_sub_field('title');
$content = get_sub_field('content');
$articles = get_sub_field('articles');
$countArticles = false;
if(is_array($articles)){
    $countArticles = count($articles);
}
$btn = get_sub_field('button');
?>
<section class="articles <?= $countArticles? 'articles--'.$countArticles.'-col' : false; ?>">
    <div class="articles__title">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>
        <?= $content; ?>
    </div>
    <?php if($articles): ?>
        <div class="articles__inner">
            <?php foreach ($articles as $article):
                $ID = $article->ID;
                $link = get_the_permalink($ID);
                $title = get_the_title($ID);
                $excerpt = wp_trim_words(get_the_excerpt($ID), 20, '...');
                $thumbnailID = get_post_thumbnail_id($ID);
                $cats = get_the_category($ID);
                $titleBtn = 'Read the full article';
                $isTemplate = array_search(416, array_column($cats, 'term_id'));
                if($isTemplate !== false){
                    $titleBtn = 'Download the FREE Guide';
                }
            ?>
                <div class="articles-item">
                    <a href="<?= $link; ?>" class="articles-item__img articles-item__badge">
                        <?= wp_get_attachment_image($thumbnailID, [647, 507]); ?>
                    </a>
                    <div class="articles-item__inner">
                        <div class="articles-item__wrapper">
                            <h3><?= $title; ?></h3>
                            <p><?= $excerpt; ?></p>
                        </div>
                        <a href="<?= $link; ?>" aria-label="Read more about <?= $title; ?>"><?= $titleBtn; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if($btn): ?>
        <div class="articles__foot">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
        </div>
    <?php endif;
    wp_reset_query();
    ?>
</section>