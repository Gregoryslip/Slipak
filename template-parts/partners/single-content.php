<?php
$thumbnail = get_post_thumbnail_id();
$tel = get_field('partnership__telephone');
$email = get_field('partnership__email');
$site = get_field('partnership__site');
$addressTitle = get_field('partnership__address-title');
$addressUrl = get_field('partnership__address-url');
$facebook = get_field('partnership__facebook');
$twitter = get_field('partnership__twitter');
$linkedin = get_field('partnership__linkedin');
?>
<section class="single-partnership">
    <div class="single-partnership__flex">
        <aside class="single-partnership__aside">
            <figure class="single-partnership__logo">
               <?= wp_get_attachment_image($thumbnail, 'full'); ?>
            </figure>
            <div class="single-partnership__contacts">
                <ul>
                    <?php if($tel): ?>
                        <li>
                            <a href="tel:<?= $tel ?>">
                                <img src="<?= THEME_URL; ?>/assets/image/icons/mobile.svg" alt="Telephone">
                                <?= $tel; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($email): ?>
                        <li>
                            <a href="mailto:<?= $email; ?>">
                                <img src="<?= THEME_URL; ?>/assets/image/icons/email.svg" alt="Email">
                                <?= $email; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($site): ?>
                        <li>
                            <a href="<?= $site['url']; ?>" target="<?= $site['target']; ?>">
                                <img src="<?= THEME_URL; ?>/assets/image/icons/globe.svg" alt="img">
                                <?= $site['title']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if($addressTitle && $addressUrl): ?>
                    <a href="<?= $addressUrl; ?>" target="_blank"><?= $addressTitle; ?></a>
                <?php endif; ?>
            </div>
            <div class="single-partnership__contacts">
                <ul  class="single-partnership__socials">
                    <?php if($facebook): ?>
                        <li>
                            <a href="<?= $facebook; ?>" target="_blank" rel="nofollow" aria-label="Facebook account">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/facebook.svg" alt="Facebook">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($twitter): ?>
                        <li>
                            <a href="<?= $twitter; ?>" target="_blank" rel="nofollow" aria-label="Twitter account">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/twitter.svg" alt="Twitter">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($linkedin): ?>
                        <li>
                            <a href="<?= $linkedin; ?>" target="_blank" rel="nofollow" aria-label="Linkedin account">
                                <img class="lazy" data-src="<?= THEME_URL; ?>/assets/image/icons/linkedin.svg" alt="Linkedin">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>
        <div class="single-partnership__text">
            <?php get_template_part('template-parts/post-builder'); ?>
        </div>
    </div>
</section>