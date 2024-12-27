<section class="w-full py-20 lg:pt-[80px] lg:pb-[80px] bg-[#F7F9FA] px-4 2xl:px-0">
    <div class="flex flex-col gap-10 lg:gap-20">
        <div class="w-full flex flex-col sm:flex-row gap-[10px] items-center justify-between max-w-[1442px] mx-auto">
            <div class="flex flex-col gap-[26px] max-w-[590px]">
                <h2 class="text-3xl md:text-[48px] font-semibold text-[#2D3646]">You might also like</h2>
                <span class="text-base lh-[34px] font-semibold px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm">Key Feature sub title</span>
            </div>
            <div class="flex gap-5 min-w-[215px] justify-end">
       
                <div class="hidden lg:flex gap-[10px]">
                    <button type="button" class="h-[44px] p-[9px] rounded-sm  bg-white article-related-slider__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
                    <button type="button" class="h-[44px] p-[9px] rounded-sm  transition-transform hover:scale-105 bg-white article-related-slider__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between gap-5 w-full max-w-[1442px] mx-auto">
            <div class="articles-related__slider swiper">
                <div class="swiper-wrapper pb-20">

		<?php 


    $cat = isset($args['cat'])? $args['cat'] : false;
    $ID = get_the_ID();
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'post__not_in' => [$ID],
        'cat' => $cat->term_id
    ];
    $articles = get_posts($args);

		if($articles){
			foreach($articles as $article){ 
				$img = get_the_post_thumbnail_url($article, 'full');
				$title = get_the_title($article);

				// Trim description to approximately 150 characters without cutting off words.
				$description = wp_trim_words(get_the_excerpt($article), 23, '...');

				$link = get_permalink($article);
				?>
				<div class="flex flex-col justify-between pb-[26px] w-[412px] h-[480px] rounded-md swiper-slide bg-white" style="box-shadow: 0px 30px 40px 0px rgba(45, 54, 70, 0.06);">
					<img src="<?= $img; ?>" alt="post-img" class="!h-[168px] !w-full object-cover rounded-tl-md rounded-tr-md">
					<div class="flex flex-col gap-2 mt-[22px] mb-[34px] px-[30px]">
						<h3 class="text-[#2D3646] text-xl"><?= $title; ?></h3>
						<p class="text-[#424A5D] opacity-70 text-base overflow-hidden text-ellipsis max-h-[104px]"><?= $description; ?></p>
					</div>
					<a type="button" href="<?= $link; ?>" class="ml-[auto] flex gap-[10px] text-[#79808B] text-[15px] lh-[24px] uppercase transition-transform hover:translate-x-2 items-center mx-[30px] font-semibold">
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