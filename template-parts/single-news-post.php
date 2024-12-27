<?php
$title = get_the_title();
$cat = get_the_category();
$authors = get_the_terms(get_the_ID(), 'authors');
$cat = $cat? $cat[0] : '';
$date = get_the_date('j F Y');
$thumbnailID = get_post_thumbnail_id();
?>
<section class="article">
    <div class="article__title">
        <h1><?= $title; ?></h1>
        <div class="article__info">
            <?php if($cat): ?>
                <a href="<?= get_term_link($cat); ?>" class="article__type with-sm-mt">
                    <?= $cat->name; ?>
                </a>
            <?php endif; ?>
            <?php if($authors): ?>
                <div class="article__date with-sm-mt">
                    Written by
                    <a href="<?= get_term_link($authors[0]); ?>" class="article__type">
                        <?= $authors[0]->name; ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="article__date with-sm-mt">
                <?= $date; ?>
            </div>
        </div>
    </div>

    <div class="article__outer">
        <div class="article__inner">
            <div class="article__img">
                <?= wp_get_attachment_image($thumbnailID, [644, 360]); ?>
            </div>

            <?php
				//ASC ADDED 230523
				if (have_posts()) : 
					while (have_posts()) : the_post(); 
						$content = get_the_content();
						if (!empty($content)) {
							echo apply_filters('the_content', $content);
						}
					endwhile;
				endif;
				//END

                get_template_part('template-parts/post-builder');
                get_template_part('template-parts/post-builder/social-network-share');
            ?>
        </div>

        <div class="article__right">
            <?php
                get_template_part('template-parts/post-builder/download-template');
                //get_template_part('template-parts/post-builder/related-articles', false, ['cat' => $cat]);
                //get_template_part('template-parts/post-builder/newsletter-form');
            ?>
        </div>
    </div>
</section>