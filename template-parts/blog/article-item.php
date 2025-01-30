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
<div class="bg-white flex flex-col rounded-[4px] shadow-[0px_30px_40px_0px_rgba(45,_54,_70,_0.06)]  <?= $isTemplate !== false? 'archive-card__template' : ''; ?>">
    <a href="<?= $link; ?>" class="relative block pb-[63%] overflow-hidden [&_img]:absolute [&_img]:w-full [&_img]:h-full [&_img]:object-cover">
        <?= wp_get_attachment_image($thumbnailID, [360, 185]); ?>
    </a>
    <div class="py-[22px] px-[25px] flex flex-col gap-[24px] justify-between h-full">
        <div class="flex flex-col gap-[8px]">
            <div class="min-h-[12px] flex flex-wrap">
                <?php if($isTemplate !== false): ?>
                    <?php if($subTitle): ?>
                        <div class="uppercase color-[#79808B] font-semibold text-[15px] mx-0">
                            <span><?= $subTitle; ?></span>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="uppercase color-[#79808B] font-semibold text-[15px] mx-0">
                        <?= wp_time_to_read($post); ?> min read
                    </div>
                    <div class="w-[1px] bg-[#B0B9BE] mx-[10px]"></div>
                    <div class="uppercase color-[#79808B] font-semibold text-[15px] mx-0">
                        <?= $date; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="flex flex-col gap-[8px]">
                <a href="<?= $link; ?>"><h3 class="text-[20px] leading-[1.5] text-[#2D3646]"><?= $title; ?></h3></a>
                <p class="text-[#424A5DB2] text-[16px] leading-[1.5]"><?= $excerpt; ?></p>
            </div>
        </div>
        <div class="archive-card__foot">
            <?php if($isTemplate === false): ?>
                <a href="<?= $link; ?>" class="link uppercase">READ FULL ARTICLE</a>
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