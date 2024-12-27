<?php
    $title = (get_field('start_rocket_title', 'option')) ? get_field('start_rocket_title', 'option') : "Start today and see why businesses choose Brixx";
    $btn = get_field('start_rocket_btn', 'option');
    $btn_url = ($btn) ? $btn['url'] : '/sign-up/trial';
    $btn_title = ($btn) ? $btn['title'] : 'Start Brixx for FREE';
    $img = get_field('start_rocket_img', 'option');
?>
<section class="w-full pb-[265px] pt-[85px] relative bg-[#F7F9FA] overflow-y-hidden">
    <div class="flex flex-col gap-[30px] max-w-[425px] mx-auto text-center px-4 sm:px-0">
        <h2 class="text-[#2D3646] font-medium text-lg"><?php echo esc_html($title); ?></h2>
        <a href="<?php echo esc_url($btn_url); ?>">
            <button type="button" class="bg-[#FF4713] px-[30px] py-4 rounded-sm transition-transform hover:scale-105 text-white w-fit mx-auto">
                <?php echo esc_html($btn_title); ?>
            </button>
        </a>
    </div>
    <?php 
        if($img){ 
            echo '<img src="' . esc_url($img) . '" alt="rocket" class="absolute -bottom-[120px] translate-x-2/4 right-[50%]">';
        } else {
            echo '<img src="/wp-content/uploads/2024/10/Group-2096-1.png" alt="rocket" class="absolute -bottom-[120px] translate-x-2/4 right-[50%]">';
        }
    ?>
</section>
