<?php
    $sidebar_tab_item = get_sub_field('sidebar_tab_item');
?>

<section class="w-full" id="features">
    <div class="my-16 items-center text-center">
        <h2 class="text-3xl md:text-5xl text-[#2D3646] font-medium"><?php the_sub_field('sidebar_section_title');?></h2>
    </div>
    <div class="flex flex-col px-4 2xl:px-0" id="tabs">
        <button type="button" class="max-h-[44px] bg-[#FF4713] rounded-sm flex lg:hidden w-fit mt-4 items-center gap-[10px] uppercase py-[13px] px-[30px] text-white transition-transform hover:scale-105">
            view features
            <img src="/wp-content/uploads/2024/10/arrow-external.svg" alt="icon">
        </button>
        <div class=" border-b border-[#A7B1BD]">
            <div class="flex w-full items-start justify-between pt-[9px] max-w-[1442px] mx-auto" id="tabsHeader">
                <div class="flex ">
                    <?php if( have_rows('sidebar_tab_item') ): ?>
                        <?php while( have_rows('sidebar_tab_item') ): the_row(); 
                            $title = get_sub_field('title'); 
                        ?>
                            <h3 class="px-1 sm:px-[30px] py-[10px] text-[#2D3646] font-semibold pb-[18px] opacity-70 cursor-pointer text-sm sm:!text-[20px]"><?php echo esc_html($title); ?></h3>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
				<?php if (get_sub_field('sidebar_tab_btn_link') && get_sub_field('sidebar_tab_btn_text')) : ?>
					<button 
						type="button" 
						class="hidden max-h-[44px] bg-[#FF4713] rounded-sm lg:flex items-center gap-[10px] uppercase py-[13px] px-[30px] text-white transition-transform hover:scale-105" 
						onclick="window.location.href='<?php echo esc_url(get_sub_field('sidebar_tab_btn_link')); ?>'">
						<?php the_sub_field('sidebar_tab_btn_text'); ?>
						<img src="/wp-content/uploads/2024/10/arrow-external.svg" alt="icon">
					</button>
				<?php endif; ?>
            </div>
        </div>                
        <div class="py-10 md:py-20 lg:py-[110px] w-full max-w-[1442px] mx-auto" id="tabsContent">
            <?php if( have_rows('sidebar_tab_item') ): ?>
                <?php while( have_rows('sidebar_tab_item') ): the_row(); 
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                    $text = get_sub_field('text');
                    $list = get_sub_field('list');
                    $image = get_sub_field('image');
                ?>
                <div class="flex w-full justify-between">
                    <div class="flex flex-col md:flex-row justify-between gap-10">
                        <div class="flex flex-col gap-[26px]">
                            <h3 class="text-[20px] md:text-[48px] font-semibold text-[#2D3646]"><?php echo esc_html($title); ?></h3>
                            <span class="px-[14px] uppercase bg-[#E2E8ED] w-fit rounded-sm  lh-[34px] text-base font-semibold"><?php echo esc_html($desc); ?></span>
                            <p class="text-[#424A5D] opacity-70 text-[20px]"><?php echo esc_html($text); ?></p>
                            <div class="flex flex-wrap md:flex-col gap-3">
                                <?php if( $list ): ?>
                                    <?php foreach( $list as $item ): ?>
                                        <div class="flex gap-4 items-center rounded-full py-[11px] px-6 w-fit bg-white" style="box-shadow: 0px 30px 40px 0px rgba(45, 54, 70, 0.06);">
                                            <img src="/wp-content/uploads/2024/10/Group-1944.svg" alt="icon">
                                            <p class="text-[#2D3646]"><?php echo esc_html($item['item']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="w-full max-w-[960px]">
                            <?php if( $image ): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-auto">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>