<?php
$selectbox = get_sub_field('selectbox');
// $items = $selectbox['items'];
?>

<section class="w-full bg-[#F7F9FA]">
    <div class="max-w-[1442px] mx-auto flex flex-col px-4 2xl:px-0">
        <div class="flex flex-col gap-[28px] max-w-[900px] items-center mx-auto">
            <div class="flex flex-col gap-[30px]">
                <div class="flex flex-col gap-[26px] items-center text-center">
                    <h2 class="text-3xl md:text-5xl text-[#2D3646] font-medium"><?= $selectbox['title']; ?></h2>
                    <span class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm lh-[34px] text-base font-semibold"><?= $selectbox['subtitle']; ?></span>
                </div>
                <p class="text-[#424A5D] opacity-70 text-center "><?= $selectbox['description']; ?></p>
            </div>
            <!-- <form action="#" class="flex gap-5 w-full max-w-[625px] flex-col md:flex-row">
                <select name="business_type" id="select" class="px-[30px] py-[15px] rounded-sm shadow-md w-full md:max-w-[354px] text-[18px] lh-[28px] font-semibold">
                    <option value="Choose your business size" hidden>Choose your business size</option>
                    <?php foreach ($items as $item): ?>
                        <option value="<?= $item['url']; ?>" data-link="<?= $item['url']; ?>"><?= $item['text']; ?></option>
                    <?php endforeach; ?>
                </select>
                <a class="bg-[#FF4713] opacity-30 px-[30px] py-[15px] text-white w-full md:max-w-[251px] text-center text-[18px] lh-[28px] font-semibold flex items-center justify-center" id="find-more" href=""><?= $selectbox['button-text']; ?></a>
            </form> -->
        </div>
    </div>
</section>