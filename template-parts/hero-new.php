<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$subtitle = get_sub_field('sub-title');
$btnLeft = get_sub_field('button-left');
$btnRight = get_sub_field('button-right');
$isTrust = get_sub_field('is_trust_pilot');
$heroImg = get_sub_field('right_picture');
$sectionBg = get_sub_field('section_bg');

global $is_hero_video_loaded;
$is_hero_video_loaded = true;
?>
<section class="w-full bg-[#F7F9FA] relative">
    <img src="<?php echo $sectionBg; ?>" alt="bg" class="absolute translate-x-2/4 right-[50%]">
    <div class="max-w-[1442px] mx-auto flex justify-between flex-col-reverse lg:flex-row items-center lg:items-start pt-16 lg:pt-[82px] relative z-10 px-4 2xl:px-0">
        <div class="flex flex-col gap-[26px] w-full max-w-[640px]">
            <div class="flex flex-col gap-5">
                <h1 class="text-[#2D3646] font-medium text-[38px] md:text-[48px] leading-tight"><?= $title; ?></h1>
                <p class="text-[#424A5D] opacity-70 text-base"><?= $description; ?></p>
            </div>
            <div class="flex flex-col gap-[10px]">
                <div class="flex flex-col md:flex-row items-center gap-4 md:gap-[22px]">
                    <?php if($btnLeft): ?>
                        <a href="<?= $btnLeft['url']; ?>" class="w-full flex items-center justify-center md:w-fit bg-[#FF4713] text-white rounded-sm py-[13px] px-[30px] transition-transform hover:scale-105 text-center text-sm font-semibold h-[54px]" target="<?= $btnLeft['target']; ?>">
                            <?= $btnLeft['title']; ?>
                        </a>
                    <?php endif; ?>

                    <?php if($btnRight): ?>
                        <a href="<?= $btnRight['url']; ?>" class="rounded-sm w-full md:w-fit h-[54px] bg-[#2D3646] flex justify-center gap-[10px] px-[13px] py-[13px] text-white transition-transform hover:scale-105 text-sm font-semibold items-center" target="<?= $btnRight['blank']; ?>"> 
                            <?= $btnRight['title']; ?>
                            <img src="/wp-content/uploads/2024/10/Play-icon.svg" alt="icon">
                        </a>
                    <?php endif; ?>
                </div>
                <span class="text-[#424A5D] italic text-base">No credit card required</span>
            </div>
			<?php
			$isTrust = get_sub_field('is_trust_pilot');

			if ($isTrust === true || $isTrust === 'true' || $isTrust === 'yes') {
				echo '<img src="/wp-content/uploads/2024/10/Frame-2117-1.png" alt="Trustpilot" class="max-w-[237px] h-auto">';
			}
			?>
        </div>
        <img src="<?php echo $heroImg; ?>" class="max-h-[280px] lg:max-w-[592px] lg:h-auto lg:max-h-full" alt="hero-img">
    </div>
</section>