<?php
    $title = get_sub_field('map_section_title');
    $text = get_sub_field('map_section_text');
    $btn = get_sub_field('map_section_btn');
    $btn_url = get_sub_field('map_section_btn_url');
    $img = get_sub_field('map_section_image');
    $items = get_sub_field('map_section_items');
?>
<section class="w-full py-20 lg:py-[100px]">
    <div class="max-w-[1442px] mx-auto flex flex-col gap-10 lg:gap-[97px] px-4 2xl:px-0">
        <div class="flex flex-col lg:flex-row gap-10 justify-between w-full">
            <div class="flex flex-col gap-[26px] w-full max-w-[590px]">
                <h2 class="text-3xl md:text-5xl font-semibold text-[#2D3646]"><?php echo esc_html($title); ?></h2>
                <p class="opacity-70 text-[#424A5D] text-[20px] leading-[32px]"><?php echo esc_html($text); ?></p>
                <a href="<?php echo esc_url($btn_url); ?>">
                    <button type="button" class="bg-[#FF4713] px-[30px] py-[9px] rounded-sm flex items-center gap-[10px] uppercase transition-transform hover:scale-105 w-fit text-white">
                        <?php echo esc_html($btn); ?>
                        <img src="/wp-content/uploads/2024/10/arrow-external.svg" alt="icon">
                    </button>
                </a>
            </div>
            <img src="<?php echo esc_url($img); ?>" alt="map">
        </div>
        <div class="flex w-full justify-center sm:justify-between gap-4 flex-wrap sm:flex-nowrap items-start">
            <?php if ($items): ?>
                <?php foreach ($items as $item): ?>
                    <div class="w-full max-w-[400px] flex flex-col gap-[14px]">
                        <h4 class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm text-base lh-[34px] font-semibold"><?php echo esc_html($item['title']); ?></h4>
                        <p class="text-[#424A5D] opacity-70 text-base leading-[26px]"><?php echo esc_html($item['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>