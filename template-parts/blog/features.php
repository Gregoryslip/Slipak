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

<div class="text-center py-12 mt-[180px]">
  <h1 class="text-[48px] leading-[60px] font-semibold text-[#2D3646] mb-4">
    <?= esc_html($title); ?>
  </h1>
  <p class="text-base leading-[26px] font-semibold uppercase bg-[#E2E8ED] px-[14px] text-[#2D3646] mt-[26px] w-fit mx-auto">
    <?= esc_html($sub_title); ?>
  </p>

  <div class="text-[18px] leading-[30px] text-[#424A5D]/70 max-w-5xl mx-auto mt-[30px]">
    <?= wp_kses_post($text); ?>
  </div>

  <div class="flex items-center gap-[44px] mx-auto mt-[70px] justify-center">
    <?php foreach ($steps as $index => $step_item): ?>
      <div class="flex flex-col items-center">
        <img src="<?= esc_url($step_item['step_item']['image']); ?>" alt="Step <?= $index + 1; ?>">
      </div>
      <?php if ($index < count($steps) - 1): ?>
        <div class="flex flex-col items-center">
          <img src="<?= esc_url(get_template_directory_uri() . '/assets/image/blog/feature-arrow.svg'); ?>" alt="arrow" class="h-[20px] w-auto">
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <div class="flex mx-auto mt-3 max-w-[1042px] justify-between">
    <?php foreach ($steps as $index => $step_item): ?>
      <div class="flex items-center gap-[18px] max-w-[200px]">
        <span class="text-white font-semibold text-[50px] leading-[70px] text-stroke">
          <?= $index + 1; ?>
        </span>
        <div class="border border-right border-[#A7B1BD] h-[39px] border-solid"></div>
        <p class="font-semibold text-[#2D3646] text-[15px] leading-[24px] text-start">
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