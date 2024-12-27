<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$subtitle = get_sub_field('sub-title');
$btnLeft = get_sub_field('button-left');
$btnRight = get_sub_field('button-right');
$titlePartners = get_sub_field('title-partners');
$partners = get_sub_field('partners');
$videoPreview = get_sub_field('video-preview');
$video = get_sub_field('video');
global $is_hero_video_loaded;
$is_hero_video_loaded = true;
?>
<section class="hero-video">
    <div class="container hero-video__container">
        <div class="hero-video__col">
            <?php if($title): ?>
                <h1><?= $title; ?></h1>
            <?php endif; ?>
            <?php if($subtitle): ?>
                <h2 id="hero-subtitle"><?= $subtitle; ?></h2>
            <?php endif; ?>
            <?php if($description): ?>
                <p><?= $description; ?></p>
            <?php endif; ?>
            <?php if($btnLeft || $btnRight): ?>
                <div class="hero-video__two-col-btn">
                    <?php if($btnLeft): ?>
                        <a href="<?= $btnLeft['url']; ?>" target="<?= $btnLeft['target']; ?>" class="btn btn--orange"><?= $btnLeft['title']; ?></a>
                    <?php endif; ?>

                    <?php if($btnRight): ?>
                        <a href="<?= $btnRight['url']; ?>" target="<?= $btnRight['blank']; ?>" class="btn btn--orange"><?= $btnRight['title']; ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($titlePartners): ?>
                <p class="title-partners"><b><?= $titlePartners; ?></b></p>
            <?php endif; ?>

            <?php if(is_array($partners) && !empty($partners)): ?>
                <ul>
                    <?php foreach ($partners as $partner):
                       $icon = $partner['icon'];
                       $url = $partner['url'];
                    ?>
                        <li>
                            <a href="<?= $url? $url : '#'; ?>">
                                <?= wp_get_attachment_image($icon['id'], 'full'); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="hero-video__col video-col">
            <div class="hero-video__video video desktop-video">
                <video id="hero-video-desktop" loop controls poster="<?= $videoPreview['url']; ?>" preload="none" playsinline webkit-playsinline>
                    <source data-src="<?= $video['url']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="hero-video__trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ffffff">
                        <path d="M405.2 232.9L126.8 67.2c-3.4-2-6.9-3.2-10.9-3.2-10.9 0-19.8 9-19.8 20H96v344h.1c0 11 8.9 20 19.8 20 4.1 0 7.5-1.4 11.2-3.4l278.1-165.5c6.6-5.5 10.8-13.8 10.8-23.1s-4.2-17.5-10.8-23.1z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>