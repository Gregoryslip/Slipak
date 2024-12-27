<?php
$author = isset($args['author'])? $args['author'] : false;
$info = get_term_field( 'description', $author->term_id );
$avatar = get_field('author__avatar', $author);
$facebook = get_field('author__facebook', $author);
$twitter = get_field('author__twitter', $author);
$linkedin = get_field('author__linkedin', $author);
?>
<section class="single-partnership">
    <div class="single-partnership__flex">
        <aside class="single-partnership__aside">
            <figure class="single-partnership__img">
                <?= $avatar? wp_get_attachment_image($avatar['id'], 'full') : ''; ?>
            </figure>
            <div class="single-partnership__contacts">
                <ul  class="single-partnership__socials">
                    <?php if($facebook): ?>
                        <li>
                            <a href="<?= $facebook ?>" target="_blank" rel="nofollow">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/facebook.svg" alt="img">
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($twitter): ?>
                        <li>
                            <a href="<?= $twitter; ?>" target="_blank" rel="nofollow">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/twitter.svg" alt="img">
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($linkedin): ?>
                        <li>
                            <a href="<?= $linkedin; ?>" target="_blank" rel="nofollow">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/linkedin.svg" alt="img">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>
        <div class="single-partnership__text">
            <?= $info; ?>
        </div>
    </div>
</section>