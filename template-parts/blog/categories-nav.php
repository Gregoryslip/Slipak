<?php
$currentCat = isset($args['cat'])? $args['cat'] : false;

$currentID = $currentCat? $currentCat->term_id : 0;
$withoutActive = isset($args['without_active'])? $args['without_active'] : false;
$args = [
    'taxonomy' => 'category',
    'hide_empty' => true
];

$categories = get_terms($args);
$countCat = count($categories);
?>
<div class="archive__links max-w-[980px] mx-auto"> 

  
    <ul class="flex items-center">
        <li class="flex items-center <?= !$currentCat && !$withoutActive? 'active-link' : ''; ?>"><a href="<?= HOME_URL; ?>/blog/">View All</a></li>
        <?php if($categories): ?>
          <div class="swiper blog-categories__slider ml-6">
            <div class="swiper-wrapper">
              <?php foreach ($categories as $cat):
              
              ?>
                  <li class="swiper-slide <?= $cat->term_id === $currentID? 'active-link' : ''; ; ?>">
                      <a href="<?= get_term_link($cat, 'category'); ?>">
                          <?= $cat->name; ?>
                      </a>
                  </li>
          
              <?php endforeach;

            ?>
            </div>
          </div>


        <?php endif; ?>
    </ul>
</div>