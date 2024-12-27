<?php
    $title = get_sub_field('brands_title');
    $sub = get_sub_field('brands_subtitle');
    $text = get_sub_field('brands_text');
    $logos = get_sub_field('logos');
?>

<section class="w-full pt-10 pb-20 lg:pb-[80px] lg:pt-[100px]">
    <div class="flex flex-col gap-10 lg:gap-[70px]">
        <div class="flex flex-col gap-[26px] max-w-[848px] text-center items-center mx-auto">
            <h2 class="text-3xl md:text-5xl text-[#2D3646] font-medium"><?php echo esc_html($title); ?></h2>
            <span class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm  lh-[34px] text-base font-semibold"><?php echo esc_html($sub); ?></span>
            <p class="mt-2 opacity-70 text-[#424A5D] max-w-[625px] text-[20px]"><?php echo esc_html($text); ?></p>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if ($logos): ?>
                    <?php foreach ($logos as $logo): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($logo['url']); ?>" class="w-full" alt="<?php echo esc_attr($logo['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>