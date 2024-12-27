<?php 
$poster = get_sub_field('poster');
$videoUrl = get_sub_field('video_url');
?>

<section class="w-full bg-[#F7F9FA]">
    <div class="max-w-[1442px] mx-auto pt-10 pb-20 lg:pt-[86px] lg:pb-[180px] px-4 2xl:px-0 flex flex-col gap-10 justify-between lg:flex-row items-center">
        

        <div class="flex flex-col gap-[26px] w-full max-w-[750px]">
            <div class="w-full shadow-lg mx-auto rounded-md lg:h-[480px] flex justify-center items-center  relative" style="box-shadow: 0px 30px 40px 0px rgba(45, 54, 70, 0.06);">
                <video id="hero-video-desktop" loop controls poster="<?php echo $poster;?>" preload="none" playsinline webkit-playsinline class="w-[99%] h-[99%] object-cover">
                    <source src="<?php echo $videoUrl; ?>" type="video/mp4">
                    <!--<source data-src="<?php echo $videoUrl; ?>" type="video/mp4">-->
                    Your browser does not support the video tag.
                </video>
                <div class="hero-video__trigger cursor-pointer absolute top-2/4 left-2/4 inset-0 flex items-center justify-center" id="video-trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ffffff" class="w-16 h-16">
                        <path d="M405.2 232.9L126.8 67.2c-3.4-2-6.9-3.2-10.9-3.2-10.9 0-19.8 9-19.8 20H96v344h.1c0 11 8.9 20 19.8 20 4.1 0 7.5-1.4 11.2-3.4l278.1-165.5c6.6-5.5 10.8-13.8 10.8-23.1s-4.2-17.5-10.8-23.1z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center gap-[26px] w-full max-w-[600px] lg:pl-8">
            <?php the_sub_field('content');?>
        </div>


    </div>           
</section>
<script>
    const video = document.getElementById('hero-video-desktop');
    const trigger = document.getElementById('video-trigger');

    video.addEventListener('play', () => {
        trigger.style.display = 'none';
    });

    trigger.addEventListener('click', () => {
        video.play(); 
        trigger.style.display = 'none';  
    });
</script>