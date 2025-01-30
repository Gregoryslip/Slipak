<?php
  $features = get_field('features');
  $title = $features['title'];
  $sub_title = $features['sub_title'];
  $text = $features['text'];
  $steps = $features['steps'];
  $button = $features['button'];
  $button_text = $button['text'];
  $button_link = $button['link'];
?>

<div class="text-center py-12 mt-[150px]">
  <h1 class="text-[36px] lg:text-[48px] leading-[1.3] font-semibold text-[#2D3646] mb-4">
    <?= esc_html($title); ?>
  </h1>
  <p class="text-base leading-[26px] font-semibold uppercase bg-[#E2E8ED] px-[14px] text-[#2D3646] mt-[26px] w-fit mx-auto tracking-[0.1em]">
    <?= esc_html($sub_title); ?>
  </p>

  <div class="lg:text-[18px] leading-[1.5] text-[#424A5D]/70 max-w-5xl mx-auto mt-[20px] lg:mt-[30px]">
    <?= wp_kses_post($text); ?>
  </div>

  <div class="hidden lg:flex items-center gap-[44px] mx-auto mt-[70px] justify-center relative lg:left-[-33px]">
    <?php foreach ($steps as $index => $step_item): ?>
      <div class="flex flex-col items-center">
        <img src="<?= esc_url($step_item['step_item']['image']); ?>" alt="Step <?= $index + 1; ?>">
      </div>
      <?php if ($index < count($steps) - 1): ?>
        <div class="flex flex-col items-center">
          <img src="<?= esc_url(get_template_directory_uri() . '/assets/image/blog/feature-arrow.svg'); ?>" alt="arrow" class="h-[33px] w-auto">
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <div class="flex flex-wrap gap-x-[20px] mx-auto mt-3 px-[20px] max-w-[1080px] justify-between relative lg:left-[20px] mt-[40px] lg:mt-0">
    <?php foreach ($steps as $index => $step_item): ?>
      <div class="flex items-center gap-[10px] sm:gap-[18px] w-full max-w-[45%] md:max-w-[20%] lg:max-w-[230px]">
        <span class="text-white font-semibold text-[50px] leading-[70px] [-webkit-text-stroke:1px_black] w-[30px] shrink-0">
          <?= $index + 1; ?>
        </span>
        <div class="border border-right border-[#A7B1BD] h-[39px] border-solid"></div>
        <p class="font-semibold text-[#2D3646] text-[14px] sm:text-[15px] leading-[24px] text-start">
          <?= esc_html($step_item['step_item']['title']); ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-[81px]">
    <a href="<?= esc_url($button_link); ?>" class="mx-auto inline-block bg-[#FF4713] text-white text-[17px] w-[213px] h-[54px] font-semibold flex items-center justify-center rounded ">
      <?= esc_html($button_text); ?>
    </a>
  </div>
</div>