<?php
$downloadTemplate = get_field('single-article__download-template');
$downloadTemplate = $downloadTemplate ? $downloadTemplate : get_field('single-article__download-template', 'option');
?>
<!-- <div class="banner-2">
    <div class="banner-2__row">
        <?php if (is_array($downloadTemplate) && isset($downloadTemplate['title'])) : ?>
            <h3 data-title-download><?= $downloadTemplate['title']; ?></h3>
        <?php endif; ?>
        <div class="banner-2__img">
            <?php if (is_array($downloadTemplate) && isset($downloadTemplate['image']['id'])) : ?>
                <?= wp_get_attachment_image($downloadTemplate['image']['id'], 'full'); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (is_array($downloadTemplate) && isset($downloadTemplate['file-url']) && isset($downloadTemplate['button-text'])) : ?>
        <a href="#modal-content" data-file-url="<?= $downloadTemplate['file-url']; ?>" id="download-trigger" class="btn btn--orange-border">
            <?= $downloadTemplate['button-text']; ?>
        </a>
    <?php endif; ?>
</div> -->

<div class="text-center sticky top-14">
  <div class="my-[40px] border border-solid border-bottom border-[#E2E8ED] h-[1px]"></div>
    <img class="w-full max-w-[170px] mx-auto" src="<?= get_template_directory_uri();?>/assets/image/blog/article-start.svg" alt="Model - Forecast - Plan">
    <div class="text-[#2D3646] leading-[28px] text-[18px] font-semibold text-center mt-[21px]">Start Brixx 7 days trial</div>
    <a href="https://app.brixx.com/sign-up/trial?utm_source=split_test&amp;utm_campaign=headercta" class=" mt-[23px] inline-block">
        <button type="button" class="bg-[#FF4713] text-white font-medium rounded-sm w-[270px] h-[54px] flex justify-center items-center transition-transform hover:scale-105">
            Start for FREE
        </button>
    </a>
    <!-- <div id="cbox-1UPTgqHS7ODMvRYn"></div> -->
</div>
