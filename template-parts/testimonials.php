<?php
    $title = get_sub_field('testimonials_title');
    $sub = get_sub_field('testimonials_subtitle');
?>

<section id="testimonials" class="w-full py-20 px-4 bg-[#F7F9FA]">
    <div class="flex flex-col gap-10 lg:gap-[30px]">
        <div class="w-full flex flex-col sm:flex-row gap-[10px] items-center justify-between max-w-[1442px] mx-auto">
            <div class="flex flex-col gap-[26px] max-w-[590px]">
                <h2 class="text-3xl md:text-5xl font-semibold text-[#2D3646]"><?php echo esc_html($title); ?></h2>
                <span class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm text-base lh-[34px] font-semibold"><?php echo esc_html($sub); ?></span>
            </div>
            <div class="flex gap-5 min-w-[215px]">
                <div class="hidden lg:flex gap-[10px]">
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md bg-white opacity-70 testimonials-slider__prev"><img src="/wp-content/uploads/2024/10/arrow-left-1-1-1.svg" alt="icon-left"></button>
                    <button type="button" class="h-[44px] p-[9px] rounded-sm shadow-md transition-transform hover:scale-105 bg-white testimonials-slider__next"><img src="/wp-content/uploads/2024/10/arrow-left-1-1.svg" alt="icon-right"></button>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between gap-5 w-full max-w-[1442px] mx-auto">

            <?php 
                    $post_type = 'testimonial';
                    $args = array(
                        'post_type'      => $post_type,
                        'posts_per_page' => -1,
                        'post_status'    => 'publish', 
                    );

                    $testimonials_query = new WP_Query($args);
                    if ($testimonials_query->have_posts()) {
                        $total_posts = $testimonials_query->found_posts; 
                        $half_posts = ceil($total_posts / 2); 
                    
                        wp_reset_postdata();
                    
                        $args_first_half = array(
                            'post_type'      => $post_type,
                            'posts_per_page' => $half_posts, 
                            'offset'         => 0, 
                            'post_status'    => 'publish',
                        );
                    
                        $first_half_query = new WP_Query($args_first_half);

                    }?>
            <div class="testimonials__slider_first swiper">
                <div class="swiper-wrapper py-2">
                    <?php

                    if( $first_half_query->have_posts() ): ?>
                        <?php while( $first_half_query->have_posts() ): $first_half_query->the_post(); 
                            $content = get_field('testimonial_text');
                            $rating = (get_field('testimonial_rating')) ? get_field('testimonial_rating') : '/wp-content/uploads/2024/10/Frame-2046.png';
                            $company = get_field('testimonial_company');
                            $logo = get_field('testimonial_company_logo');
                        ?>
                        <div class="flex flex-col justify-between p-[30px] w-full max-w-[514px] h-[290px] rounded-md shadow-md bg-white swiper-slide testimonial-outer-container">
                            <div class="flex flex-col gap-[9px] w-full justify-between h-full">
                                <div class="w-full flex flex-col gap-[10px]">
                                    <img src="<?= $rating; ?>" class="!h-[22px]" alt="">
                                    <div class="flex h-[138px] flex-col gap-[10px] overflow-hidden testimonial-inner-content">
                                        <span class="uppercase text-[#A7B1BD] font-semibold"><?= $company; ?> & brix</span>
                                        <h3 class="text-[18px] text-[#2D3646] font-semibold"><?php the_title(); ?></h3>
                                        
                                        
                                        <p class="opacity-70 text-[#424A5D] text-base max-h-[80px]"><?= $content; ?></p>
                                    </div>
                                    
                                
                                </div>
                           
                                <div class="flex ">
                                    <img class="testimonial-logo" src="<?= $logo; ?>" class="max-h-[62px]" alt="">
                                </div>
                            </div>
                        </div>

                        <?php endwhile; 
                        wp_reset_postdata(); ?>
                        
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap justify-center lg:justify-between gap-5 w-full max-w-[1442px] mx-auto">
            <div class="testimonials__slider_second swiper">
                <div class="swiper-wrapper py-2">
                    <?php
                    $args_second_half = array(
                        'post_type'      => $post_type,
                        'posts_per_page' => $half_posts, 
                        'offset'         => $half_posts, 
                        'post_status'    => 'publish',
                    );

                    $second_half_query = new WP_Query($args_second_half);
                    if( $second_half_query->have_posts() ): ?>
                        <?php while( $second_half_query->have_posts() ): $second_half_query->the_post(); 
                            $content = get_field('testimonial_text');
                            $rating = (get_field('testimonial_rating')) ? get_field('testimonial_rating') : '/wp-content/uploads/2024/10/Frame-2046.png';
                            $company = get_field('testimonial_company');
                            $logo = get_field('testimonial_company_logo');
                        ?>
                        <div class="flex flex-col justify-between p-[30px] w-full max-w-[514px] h-[290px] rounded-md shadow-md bg-white swiper-slide testimonial-outer-container">
                            <div class="flex flex-col gap-[9px] w-full justify-between h-full">
                                <div class="w-full flex flex-col gap-[10px]">
                                    <img src="<?= $rating; ?>" class="!h-[22px]" alt="">
                                    <div class="flex h-[138px] flex-col gap-[10px] overflow-hidden testimonial-inner-content">
                                        <span class="uppercase text-[#A7B1BD] font-semibold"><?= $company; ?> & brix</span>
                                        <h3 class="text-[18px] text-[#2D3646] font-semibold"><?php the_title(); ?></h3>
                                        
                                        
                                        <p class="opacity-70 text-[#424A5D] text-base max-h-[80px]"><?= $content; ?></p>
                                    </div>
                                
                                </div>
                        
                                <div class="flex ">
                                    <img class="testimonial-logo" src="<?= $logo; ?>" class="max-h-[62px]" alt="">
                                </div>
                            </div>
                        </div>

                        <?php endwhile; 
                        wp_reset_postdata(); ?>
                        
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
        
        <!-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if ($logos): ?>
                    <?php foreach ($logos as $logo): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($logo['url']); ?>" class="w-full" alt="<?php echo esc_attr($logo['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div> -->
    </div>
    <!-- <img src="/wp-content/uploads/2024/10/Group-2082.png" alt="testimonials" class="w-full"> -->
</section>