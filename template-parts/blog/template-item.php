<?php

$bg_image = isset($args['bg-image']) ? esc_url($args['bg-image']) : '';
$title = isset($args['title']) ? esc_html($args['title']) : '';
$title_class = isset($args['title_class']) ? esc_html($args['title_class']) : '';
$title_span = isset($args['title_span']) ? esc_html($args['title_span']) : '';
$title_span_class = isset($args['title_span_class']) ? esc_html($args['title_span_class']) : '';
$subtitle = isset($args['subtitle']) ? esc_html($args['subtitle']) : '';
$subtitle_class = isset($args['subtitle_class']) ? esc_html($args['subtitle_class']) : '';
$features = isset($args['feature-item']) ? $args['feature-item'] : []; // Array of features
$href = isset($args['href']) ? esc_url($args['href']) : '#';
?>


    <div class="archive-card bg-white flex flex-col justify-between">
      <div class="card-content__bg flex-1" style="background-image: url('<?php echo $bg_image; ?>'); background-size: cover; background-position: center;">
        <div class="flex flex-col justify-between h-full">
          <div class="top py-[25px] px-[30px]">
            <h2 class="text-[28px] <?= $title_class; ?> leading-[38px] font-semibold "><?php echo $title; ?>
            <div class="italic <?= $title_span_class; ?>"><?= $title_span; ?></div>
          </h2>
            <div class="mt-[12px] italic text-[20px] leading-[26px] font-semibold <?= $subtitle_class; ?>"><?php echo $subtitle; ?></div>
          </div>

          <ul class="features-list text-base text-white px-[26px] py-[20px] bg-white/10 backdrop-blur-lg">
            <?php foreach ($features as $feature) : ?>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <?php echo esc_html($feature); ?>
                </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class=" h-[24%] flex justify-center items-center">
            
        <a href="<?php echo $href; ?>" class="bg-[#FF4713] text-white font-semibold text-[17px] rounded-sm h-[54px] w-[174px] flex justify-center items-center transition-transform hover:scale-105">
            FREE download
        </a> 
      </div>
    </div>

