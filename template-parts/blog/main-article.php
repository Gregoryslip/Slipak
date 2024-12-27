<?php
$mainArticle = isset($args['main_article'])? $args['main_article'] : false;
$popularArticles = isset($args['popular_articles'])? $args['popular_articles'] : false;
?>
<div class="archive__inner">
    <?php if($mainArticle):
        $thumbnailID = get_post_thumbnail_id($mainArticle);
        $date = get_the_date('j F Y', $mainArticle);
        $title = get_the_title($mainArticle);
        $cat = get_the_category($mainArticle);
        $excerpt = get_the_excerpt($mainArticle);
        $link = get_the_permalink($mainArticle);
    ?>
        <div class="archive__top-card">
            <div class="archive-card">
                <a href="<?= $link; ?>" class="archive-card__img">
                    <?= wp_get_attachment_image($thumbnailID, [740, 300]); ?>
                </a>
                <div class="archive-card__outer">
                    <div class="archive-card__inner">
                        <div class="archive-card__top">
                            <?php if($cat): ?>
                                <div class="archive-card__part">
                                    <a href="<?= get_term_link($cat[0]->term_id, 'category'); ?>">
                                        <?= $cat[0]->name; ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="archive-card__date">
                                <?= $date; ?>
                            </div>

                            <div class="archive-card__time">
                                <?= wp_time_to_read($mainArticle); ?> min read
                            </div>
                        </div>
                        <div class="archive-card__text">
                            <a href="<?= $link; ?>"><h3><?= $title; ?></h3></a>
                            <p><?= $excerpt; ?></p>
                        </div>
                    </div>
                    <div class="archive-card__foot">
                        <a href="<?= $link; ?>" class="link">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($popularArticles): ?>
        <div class="archive__popular">
            <h3>Most popular articles</h3>
            <ul>
                <?php foreach ($popularArticles as $popularArticle): ?>
                    <li>
                        <a href="<?= get_the_permalink($popularArticle->ID); ?>">
                            <?= get_the_title($popularArticle->ID); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>