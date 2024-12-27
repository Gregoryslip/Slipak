<?php
$facebook = get_field('theme-settings__facebook', 'option');
$twitter = get_field('theme-settings__twitter', 'option');
$linkedin = get_field('theme-settings__linkedin', 'option');
$description = get_field('footer__description', 'option');
$copyright = get_field('footer__copyright', 'option');
$images = 'footer__images';
$columns = 'footer__columns';
?>
</main>
<footer class="w-full pt-10 md:pt-[76px] pb-[30px] px-4 2xl:px-0">
    <div class="w-full max-w-[1442px] mx-auto flex flex-col">
        <div class="flex flex-col xl:flex-row justify-center xl:justify-between items-start gap-5">
            <div class="flex flex-col gap-4 max-w-[370px]">
                <a href="/">
                    <img src="/wp-content/uploads/2024/10/Website-logo-1.svg" alt="logo" width="120" height="38">
                </a>
                <p class="text-sm text-[#424A5D] opacity-70"><?= $description; ?></p>
                <div class="mt-[10px] flex items-center gap-[14px] justify-center md:justify-start">
                    <?php if($facebook): ?>
                        <a href="<?= $facebook; ?>" target="_blank" aria-label="Facebook" rel="nofollow" class="footer__icon transition-transform hover:scale-105">
                            <img src="/wp-content/uploads/2024/10/facebook-1.svg" alt="facebook">
                        </a>
                    <?php endif; ?>

                    <?php if($twitter): ?>
                        <a href="<?= $twitter; ?>" target="_blank" aria-label="X" rel="nofollow" class="footer__icon transition-transform hover:scale-105">
                            <img src="/wp-content/uploads/2024/10/Group-2049.svg" alt="X">
                        </a>
                    <?php endif; ?>

                    <?php if($linkedin): ?>
                        <a href="<?= $linkedin; ?>" target="_blank" aria-label="Linkedin" rel="nofollow" class="footer__icon transition-transform hover:scale-105">
                            <img src="/wp-content/uploads/2024/10/linkedin-1.svg" alt="linkedin">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-x-5 gap-y-[36px] w-full xl:max-w-[860px]">
            <?php if (have_rows($columns, 'option')): ?>
                <?php while (have_rows($columns, 'option')): the_row(); ?>
                    <?php while (have_rows('rows')): the_row();
                        $title = get_sub_field('title');
                    ?>
                        <div class="flex flex-col gap-2 text-[#2D3646] items-center sm:items-start">
                            <h6 class="font-semibold text-[17px] leading-[30px]"><?= esc_html($title); ?></h6>
                            <ul class="text-sm opacity-70 flex flex-col gap-1.5">
                                <?php while (have_rows('items')): the_row();
                                    $link = get_sub_field('link');
                                ?>
                                    <li class="text-[15px] leading-[30px]"><a class="text-[#424A5D]/0.7" href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target']); ?>"><?= esc_html($link['title']); ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endwhile; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
        <div class="pt-5 border-t border-[#DFE3E5] w-full mt-10">
            <span class="text-sm text-[#424A5D] opacity-70"><?= $copyright; ?></span>
        </div>
    </div>
</footer>

<div class="fixed-btn">

</div>

<div id="modal-window" class="modal-window">
    <div id="modal-video" class="modal-window__item modal-window__video modal-video-item">
        <button aria-label="close modal window" class="modal-video-item__close modal-window__close-icon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M18.9422 1.0572C19.4629 1.5779 19.4629 2.42212 18.9422 2.94281L2.94216 18.9428C2.42146 19.4635 1.57724 19.4635 1.05654 18.9428C0.535841 18.4221 0.535841 17.5779 1.05654 17.0572L17.0565 1.0572C17.5772 0.536497 18.4215 0.536497 18.9422 1.0572Z"
                      fill="white" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M1.05654 1.0572C1.57724 0.536497 2.42146 0.536497 2.94216 1.0572L18.9422 17.0572C19.4629 17.5779 19.4629 18.4221 18.9422 18.9428C18.4215 19.4635 17.5772 19.4635 17.0565 18.9428L1.05654 2.94281C0.535841 2.42212 0.535841 1.5779 1.05654 1.0572Z"
                      fill="white" />
            </svg>
        </button>
        <div class="modal-video-item__wr-iframe">
            <iframe src="" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>

    <div class="modal-window__fader"></div>
</div>

<!-- TEMPORARY PATCH FOR MOBILE PARENT ITEMS -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownLinks = document.querySelectorAll("[data-dropdown-head]");
        const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

        dropdownLinks.forEach(link => {
            if (isTouchDevice) {
                link.addEventListener("click", function (event) {
                    const parent = link.closest(".hover-link");
                    const submenu = parent.querySelector(".submenu");

                    if (!submenu) {
                        return; // Allow normal navigation if no submenu
                    }

                    if (!parent.classList.contains("active")) {
                        event.preventDefault();
                        closeAllDropdowns();
                        parent.classList.add("active");
                        submenu.style.display = "block";
                    } else {
                        closeAllDropdowns();
                        window.location = link.getAttribute("href");
                    }
                });
            } else {
                link.addEventListener("click", function () {
                    window.location = link.getAttribute("href");
                });
            }
        });

        function closeAllDropdowns() {
            document.querySelectorAll(".hover-link.active").forEach(activeParent => {
                const submenu = activeParent.querySelector(".submenu");
                if (submenu) submenu.style.display = "none";
                activeParent.classList.remove("active");
            });
        }

        document.addEventListener("click", function (event) {
            if (!event.target.closest(".hover-link")) {
                closeAllDropdowns();
            }
        });
    });
</script>

<?php wp_footer(); ?>

<!-- ENGAGEBAY TRACKING -->
<!--<script type="text/javascript" >
	var EhAPI = EhAPI || {}; EhAPI.after_load = function(){
	EhAPI.set_account('ca1rik3dn46h02bda70up7a7n4', 'brixx');
	EhAPI.execute('rules');};(function(d,s,f) {
	var sc=document.createElement(s);sc.type='text/javascript';
	sc.async=true;sc.src=f;var m=document.getElementsByTagName(s)[0];
	m.parentNode.insertBefore(sc,m);
	})(document, 'script', '//d2p078bqz5urf7.cloudfront.net/jsapi/ehform.js?v' + new Date().getHours());
</script>-->
<!-- ENGAGEBAY TRACKING END -->

<!-- LOADING SPINNER ON CONTACT -->
<?php if (get_the_ID() == 9541 ): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var container = document.getElementById('eh_form_4513716081262592');
    var spinner = document.createElement('div');
    spinner.setAttribute('id', 'spinner');
    container.appendChild(spinner);

    var originalConsoleLog = console.log;

    console.log = function (message) {
        originalConsoleLog.apply(console, arguments);
        if (message === 'Form loaded') {
            spinner.style.display = 'none';
            console.log = originalConsoleLog;
        }
    };

    setTimeout(function() {
        spinner.style.display = 'none';
        console.log = originalConsoleLog;
    }, 5000);
});
</script>
<?php endif; ?>
<!-- LOADING SPINNER ON CONTACT END -->

<!-- BUSINESS DOCTOR IFRAME PARENT PATCH -->
<?php if ( is_page( 20143 ) ) : ?>
    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default navigation
                parent.postMessage({ url: e.target.href }, '*'); // Send the URL to the parent window
            });
        });
    });
    </script>
<?php endif; ?>
<!-- BUSINESS DOCTOR IFRAME PARENT PATCH END-->

<!-- TAB MODULE DYNAMIC CREATION -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('#tabsHeader h3');
        const tabsContent = document.querySelectorAll('#tabsContent > div');

        tabs.forEach((tab, i) => {
            tab.addEventListener('click', () => {
            tabs.forEach((t) => t.style.opacity = 0.7);
            tabs.forEach((t) => t.style.border = 0);

            tab.style.opacity = 1;
            tab.style.borderBottom = '2px solid #FF4713';

            tabsContent.forEach((content) => {
                content.style.display = 'none';
            });

            tabsContent[i].style.display = 'block';
            });
        });

        if (tabs.length > 0) {
            tabs[0].click();
        }
        });
</script>
<!-- TAB MODULE DYNAMIC CREATION END -->

<!-- SWIPER CONFIGURATION -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
    loop: true,
    slidesPerView: 6,
    spaceBetween: 30,
    centeredSlides: true,
    speed: 5000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },    
    grabCursor: true,
    });

    const swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    slidesPerView: 6,
    spaceBetween: 30,
    centeredSlides: true,
    direction: 'horizontal',
    speed: 5000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        reverseDirection: true,
    },   
    grabCursor: true, 
    });
</script>
<!-- SWIPER CONFIGURATION END -->

</body>

</html>