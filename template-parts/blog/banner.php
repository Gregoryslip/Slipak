<?php
$cat = isset($args['cat'])? $args['cat'] : false;
if ($cat){
    $subtitle = get_field('banner__subtitle', $cat);
    $title = get_field('banner__title', $cat);
    $img = get_field('banner__image', $cat);
    $subtitle = $subtitle? $subtitle : '';
    $title = $title? $title : $cat->name;
    $img = $img? $img : get_field('banner__image', 134);

} else {
    $subtitle = get_field('banner__subtitle');
    $title = get_field('banner__title');
    $img = get_field('banner__image');
}
?>
<section class=" bg-white mt-[80] px-[16px]">
  <div class="w-full max-w-[1400px] flex flex-col items-center">
    <div class="breadcrumbs w-full text-center">
                <?php  get_template_part('template-parts/breadcrumbs'); ?>
            </div>
            <h1 class="mt-[20px] text-[30px] lg:text-[40px] threa tracking-[-.1px]"><?= $title; ?></h1>
            <div class="flex content-center w-full">
              <?php  get_template_part('template-parts/blog/search-form'); ?>
            </div>
            
  </div>

</section>