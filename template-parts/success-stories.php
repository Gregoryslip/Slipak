<?php
    $title = get_sub_field('success_stories_title');
    $text = get_sub_field('success_stories_subtitle');
    $btn = get_sub_field('success_stories_btn');
    $stories = get_sub_field('page_with_story');
    $video_url = get_sub_field('success_stories_video_url');
    $video_title = get_sub_field('success_stories_video_title');
    $placeholder = get_sub_field('success_stories_video_placeholder');
    $author = get_sub_field('success_stories_video_author');
    $author_position = get_sub_field('success_stories_video_author_position');
?>
<section class="w-full py-20 lg:pt-[190px] lg:pb-[180px] bg-[#F7F9FA] relative overflow-y-hidden">
    <img src="/wp-content/uploads/2024/10/Group-2015-1.png" alt="background" class="absolute translate-x-2/4 right-[50%] w-full">
    <div class="max-w-[1442px] mx-auto flex flex-col gap-10 lg:gap-20 relative z-10 px-4 2xl:px-0">
        <div class="w-full flex flex-col md:flex-row gap-3 items-center justify-between">
            <div class="flex flex-col gap-[26px] items-center">
                <h2 class="text-3xl md:text-5xl text-[#2D3646] font-medium"><?php echo esc_html($title); ?></h2>
                <span class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm  lh-[34px] text-base font-semibold"><?php echo esc_html($sub); ?></span>
            </div>
            <div class="flex flex-col lg:flex-row gap-5 min-w-[265px]">
                <a href="<?php echo esc_url($btn['url']); ?>">
                    <button type="button" class="w-fit bg-[#FF4713] text-white rounded-sm py-[13px] px-[30px] transition-transform hover:scale-105 flex gap-[10px] items-center uppercase">
                        <?php echo esc_html($btn['title']); ?>
                        <img src="/wp-content/uploads/2024/10/arrow-external.svg" alt="icon">
                    </button>
                </a>                
                <div class="hidden lg:flex gap-[10px]">
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md bg-white opacity-70 success-stories__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md transition-transform hover:scale-105 bg-white success-stories__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-5">
            <div class="flex flex-col justify-end w-full sm:max-w-[350px] h-[520px] rounded-md shadow-md relative bg-white js-video">
               <video loop controls poster="<?php echo $placeholder;?>" preload="none" playsinline webkit-playsinline class="absolute top-0 left-0 w-full h-full object-cover js-video-video">
                    <source src="<?php echo $video_url; ?>" type="video/mp4">
                    <!--<source data-src="<?php echo $video_url; ?>" type="video/mp4">-->
                    Your browser does not support the video tag.
                </video>
                <div class="cursor-pointer absolute top-[140px] left-1/2 -translate-x-1/2 js-video-trigger [.js-video-play_&]:hidden">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M40 73.3337C58.4095 73.3337 73.3333 58.4098 73.3333 40.0003C73.3333 21.5908 58.4095 6.66699 40 6.66699C21.5905 6.66699 6.66663 21.5908 6.66663 40.0003C6.66663 58.4098 21.5905 73.3337 40 73.3337Z" stroke="white" stroke-opacity="0.37" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M33.3334 26.667L53.3334 40.0003L33.3334 53.3337V26.667Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                </div>


                <div class="h-[211px] absolute button-0 z-10 bg-gradient-to-t from-[#FF4713] opacity-30 w-full rounded-b-md [.js-video-play_&]:hidden"></div>
                <!-- <div class="absolute inset-0 z-0 rounded-md" style="background: url('<?php the_sub_field('success_stories_video_placeholder');?>'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div> -->
                
                
                <div class="px-10 pb-[28px] flex flex-col gap-[14px] relative z-20 [.js-video-play_&]:hidden">
                    <h3 class="text-3xl font-semibold text-[#FF4713] stroke-text">
                    <?php echo esc_html($video_title); ?>
                    </h3>
                    <span class="text-white text-sm"><?php echo esc_html($author); ?> - <?php echo esc_html($author_position); ?></span>
                </div>
            </div>
            <?php 
            if($stories){?>
            <div class="swiper success-stories__slider">
                <div class="swiper-wrapper">

                
            <?php
                foreach($stories as $story){
                    $title = get_the_title($story);
                    $story_title = get_field('customer-story__title', $story);
                    $img = get_the_post_thumbnail($story);
                    $description = get_field('customer-story__description', $story);
                    $author = get_field('customer-story__author', $story);
                    $position = get_field('customer-story__position', $story);
                    $icon = get_field('customer-story__icon', $story);
                    $link = get_the_permalink($story); 
                    ?>
                    <div class="flex flex-col justify-between pt-[30px] pl-10 pr-[30px] pb-[28px] w-full max-w-[412px] h-[520px] rounded-md shadow-md bg-white swiper-slide">
                        <div class="flex flex-col gap-[26px]">
                            <div class="w-full flex justify-end">
                                <a href="<?= $link; ?>" class="flex gap-1.5 items-center transition-transform hover:translate-x-2 text-[#79808B] uppercase text-[15px] font-semibold">
                                    VIEW success story
                                    <img src="/wp-content/uploads/2024/10/chevron-right-1-1.svg" alt="arrow-right">
                                </a>
                            </div>
                            <div class="flex flex-col gap-[10px] max-w-[330px]">
                                <span class="uppercase text-[#A7B1BD] font-semibold text-base"><?= $title; ?> & Brixx</span>
                                <h3 class="text-[24px] text-[#2D3646] font-semibold"><?= $story_title; ?></h3>
                                <p class="opacity-70 text-[#424A5D] text-base"><?= $description; ?></p>
                            </div>
                        </div>
                        <div class="flex w-full justify-between items-center">
                            <div class="flex flex-col gap-3">
                                <div class="text-[#2D3646] text-[17px]"><?= $author; ?></div>
                                <div class="text-[#2D3646] text-[17px] font-semibold"><?= ($position) ? $position : 'No position'; ?></div>
                            </div>
                            <div class="flex ">
                                <img src="<?= $icon['url'] ;?>" class="max-h-[62px] max-w-[180px]" alt="">
                            </div>
                        </div>
                    </div>
                    
                    
            <?php
                }
            } 
            ?>
                </div>
            </div>
            
            
            <!-- <div class="flex flex-col justify-between pt-[30px] pl-10 pr-[30px] pb-[28px] w-full max-w-[412px] h-[480px] rounded-md shadow-md bg-white">
                <div class="flex flex-col gap-[26px]">
                    <div class="w-full flex justify-end">
                        <button type="button" class="flex gap-1.5 items-center transition-transform hover:translate-x-2 text-[#79808B] uppercase">
                            VIEW success story
                            <img src="/wp-content/uploads/2024/10/chevron-right-1-1.svg" alt="arrow-right">
                        </button>
                    </div>
                    <div class="flex flex-col gap-[10px] max-w-[330px]">
                        <span class="uppercase text-[#A7B1BD] font-semibold">Bird Eyewear & Brixx</span>
                        <h3 class="text-2xl text-[#2D3646] font-semibold">‘Great usability and very intuitive’</h3>
                        <p class="opacity-70 text-[#424A5D] text-base">Brixx is visually engaging, intuitive and easy for the whole business team to use. We understand our business better than we ever did before – from the smallest financial detail to the overall picture in just a couple of clicks.</p>
                    </div>
                </div>
                <div class="flex w-full justify-between">
                    <div class="flex flex-col gap-3">
                        <h4 class="text-[#2D3646]">Ed Bird</h4>
                        <h5 class="text-[#2D3646] font-semibold">CTO</h5>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex flex-col justify-between pt-[30px] pl-10 pr-[30px] pb-[28px] w-full max-w-[412px] h-[480px] rounded-md shadow-md bg-white">
                <div class="flex flex-col gap-[26px]">
                    <div class="w-full flex justify-end">
                        <button type="button" class="flex gap-1.5 items-center transition-transform hover:translate-x-2 text-[#79808B] uppercase">
                            VIEW success story
                            <img src="/wp-content/uploads/2024/10/chevron-right-1-1.svg" alt="arrow-right">
                        </button>
                    </div>
                    <div class="flex flex-col gap-[10px] max-w-[330px]">
                        <span class="uppercase text-[#A7B1BD] font-semibold">Bird Eyewear & Brixx</span>
                        <h3 class="text-2xl text-[#2D3646] font-semibold">‘Great usability and very intuitive’</h3>
                        <p class="opacity-70 text-[#424A5D] text-base">Brixx is visually engaging, intuitive and easy for the whole business team to use. We understand our business better than we ever did before – from the smallest financial detail to the overall picture in just a couple of clicks.</p>
                    </div>
                </div>
                <div class="flex w-full justify-between">
                    <div class="flex flex-col gap-3">
                        <h4 class="text-[#2D3646]">Ed Bird</h4>
                        <h5 class="text-[#2D3646] font-semibold">CTO</h5>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex flex-col justify-between pt-[30px] pl-10 pr-[30px] pb-[28px] w-full max-w-[412px] h-[480px] rounded-md shadow-md bg-white">
                <div class="flex flex-col gap-[26px]">
                    <div class="w-full flex justify-end">
                        <button type="button" class="flex gap-1.5 items-center transition-transform hover:translate-x-2 text-[#79808B] uppercase">
                            VIEW success story
                            <img src="/wp-content/uploads/2024/10/chevron-right-1-1.svg" alt="arrow-right">
                        </button>
                    </div>
                    <div class="flex flex-col gap-[10px] max-w-[330px]">
                        <span class="uppercase text-[#A7B1BD] font-semibold">Bird Eyewear & Brixx</span>
                        <h3 class="text-2xl text-[#2D3646] font-semibold">‘Great usability and very intuitive’</h3>
                        <p class="opacity-70 text-[#424A5D] text-base">Brixx is visually engaging, intuitive and easy for the whole business team to use. We understand our business better than we ever did before – from the smallest financial detail to the overall picture in just a couple of clicks.</p>
                    </div>
                </div>
                <div class="flex w-full justify-between">
                    <div class="flex flex-col gap-3">
                        <h4 class="text-[#2D3646]">Ed Bird</h4>
                        <h5 class="text-[#2D3646] font-semibold">CTO</h5>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const videoWrappers = document.querySelectorAll('.js-video');
        videoWrappers.forEach((videoWrapper) => {
            const successVideo = videoWrapper.querySelector('.js-video-video');
            const successTrigger = videoWrapper.querySelector('.js-video-trigger');

            successVideo.addEventListener('play', () => {
                videoWrapper.classList.add('js-video-play');
            });

            successTrigger.addEventListener('click', () => {
                successVideo.play();
                videoWrapper.classList.add('js-video-play');
            });
        })
    })
</script>
