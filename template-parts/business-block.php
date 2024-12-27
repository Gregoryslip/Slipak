<?php
$types = get_sub_field('types');
$items = get_sub_field('items');
$selectbox = get_sub_field('group');
$selectbox_items = $selectbox['items'];
?>

<section class="w-full bg-[#F7F9FA]">
    <div class="max-w-[1442px] mx-auto pb-20 lg:pb-[180px] lg:pt-[40px] flex flex-col gap-[80px] px-4 2xl:px-0">
        <div class="flex flex-col xl:flex-row gap-10 mx-auto mt-10 2xl:mt-0">
            <div class="flex flex-col w-full max-w-[580px] gap-6 justify-between">
                <?php if ($types): ?>
                    <?php foreach ($types as $type): ?>
                        <div class="flex items-center gap-[56px] column-items-mobile-override">
                            <h3 class="font-semibold text-xl text-[#2D3646] w-full max-w-[182px] text-center">
                                <?php echo esc_html($type['name']); ?>
                            </h3>
                            <p class="border-b border-[#DFE3E5] opacity-70 text-base">
                                <?php echo esc_html($type['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="#" class="flex gap-5 w-full max-w-[625px] flex-col md:flex-row mt-8">
                    <select name="business_type" id="select" class="px-[30px] py-[15px] rounded-sm shadow-md w-full md:max-w-[354px] text-[18px] lh-[28px] font-semibold">
                        <option value="Choose your business size" hidden>Choose your business size</option>
                        <?php foreach ($selectbox_items as $item): ?>
                            <option value="<?= $item['url']; ?>" data-link="<?= $item['url']; ?>"><?= $item['text']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a class="bg-[#FF4713] opacity-30 px-[30px] py-[15px] text-white w-full md:max-w-[251px] text-center text-[18px] lh-[28px] font-semibold flex items-center justify-center" id="find-more" href=""><?= $selectbox['button-text']; ?></a>
                </form>
            </div>
            <div class="grid grid-cols-2 xl:grid-cols-3 gap-[10px]">
                <?php if ($items): ?>
                    <?php foreach ($items as $item): ?>
                        <a href="<?php echo esc_url($item['link']); ?>" class="flex flex-col justify-center items-center gap-[2px] pt-[30px] pb-[24px] 2xl:w-[230px] 2xl:h-[156px] shadow-md rounded-md bg-white transition-transform hover:scale-105 cursor-pointer">
                            <?php if (!empty($item['icon'])): ?>
                                <img src="<?php echo esc_url($item['icon']); ?>" alt="icon">
                            <?php endif; ?>
                            <span class="text-lg text-[#2D3646] font-semibold">
                                <?php echo esc_html($item['name']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>