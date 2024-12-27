<?php
    $title = get_sub_field('articles_title');
    $sub = get_sub_field('articles_subtitle');
    $articles = get_sub_field('articles');
    $btn = get_sub_field('articles_button');
?>

<section class="w-full py-20 lg:pt-[80px] lg:pb-[80px] bg-[#F7F9FA] px-4 2xl:px-0">
    <div class="flex flex-col gap-10 lg:gap-20">
        <div class="w-full flex flex-col sm:flex-row gap-[10px] items-center justify-between max-w-[1442px] mx-auto">
            <div class="flex flex-col gap-[26px] max-w-[590px]">
                <h2 class="text-3xl md:text-5xl font-semibold text-[#2D3646]"><?php echo esc_html($title); ?></h2>
                <span class="text-base lh-[34px] font-semibold px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm"><?php echo esc_html($sub); ?></span>
            </div>
            <div class="flex gap-5 min-w-[215px]">
                <a href="<?= $btn['url']; ?>" class="text-base lh-[34px] tracking-[0.1rem] bg-[#FF4713] text-white rounded-sm py-[13px] px-[30px] transition-transform hover:scale-105 flex gap-[10px] items-center uppercase">
                    <?= $btn['title']; ?>
                    <img src="/wp-content/uploads/2024/10/arrow-external.svg" alt="icon">
                </a>
                <div class="hidden lg:flex gap-[10px]">
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md bg-white opacity-70 artice-slider__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md transition-transform hover:scale-105 bg-white artice-slider__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between gap-5 w-full max-w-[1442px] mx-auto">
            <div class="articles__slider swiper">
                <div class="swiper-wrapper py-2">

		<?php 
		if($articles){
			foreach($articles as $article){ 
				$img = get_the_post_thumbnail_url($article, 'full');
				$title = get_the_title($article);

				// Trim description to approximately 150 characters without cutting off words.
				$description = wp_trim_words(get_the_excerpt($article), 23, '...');

				$link = get_permalink($article);
				?>
				<div class="flex flex-col justify-between pb-[26px] w-[412px] h-[480px] rounded-md shadow-md swiper-slide bg-white">
					<img src="<?= $img; ?>" alt="post-img" class="!h-[168px] !w-full object-cover rounded-tl-md rounded-tr-md">
					<div class="flex flex-col gap-2 mt-[22px] mb-[34px] px-[30px]">
						<h3 class="text-[#2D3646] text-xl"><?= $title; ?></h3>
						<p class="text-[#424A5D] opacity-70 text-base overflow-hidden text-ellipsis max-h-[104px]"><?= $description; ?></p>
					</div>
					<a type="button" href="<?= $link; ?>" class="ml-[auto] flex gap-[10px] text-[#79808B] text-[15px] lh-[24px] uppercase transition-transform hover:translate-x-2 items-center mx-[30px]">
						READ FULL ARTICLE
						<img src="/wp-content/uploads/2024/10/chevron-right-1-1.svg" alt="icon">
					</a>
				</div>

		<?php    
			}
		}
		?>

                </div>
            </div>
        </div>
    </div>
</section>