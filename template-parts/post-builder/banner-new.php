<?php
$banner = get_field('single-article__banner', 'option');
$categories = get_the_category();
?>
<section class="hero-small hero-small--article flex justify-center flex-col items-center">
    <div class="breadcrumbs">
        <?php  get_template_part('template-parts/breadcrumbs'); ?>
    </div>
    <h1 class="text-[40px] font-semibold leading-[54px] text-[#2D3646] max-w-6xl text-center !mt-[20px]"><?php the_title(); ?></h1>
    <div class="flex gap-[8px] mt-[30px]"><?php 
      foreach ($categories as $category) {
        echo '<div class="w-fit py-[2px] px-[16px] rounded-[50px] bg-[#F0F3F6] text-[#2D3646]/70 text-[15px] leading-[24px]">#'.esc_html($category->name).'</div>';
          // echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a><br>';
      } 
    ?>
    </div>
    <div class="mt-[24px] flex gap-[14px] uppercase text-[17px] text-[#79808B] leading-[34px] font-semibold"><?php the_author(); ?><span>|</span>11min read <span>|</span><?php the_modified_date('j F Y'); ?></div>
    <div class="flex gap-[20px] mt-[14px]">
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/icons/fb-black.svg" alt=""></a>
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/icons/x-black.svg" alt=""></a>
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/icons/lin-black.svg" alt=""></a>
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/icons/tg-black.svg" alt=""></a>
      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/icons/wa-black.svg" alt=""></a>
    </div>
</section>