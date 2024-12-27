<?php
global $wp;
$currentUrl = home_url($wp->request) . '/';
$btn = get_field('header__button', 'option');
$myAccount = get_field('header__my-account', 'option');
$ID = get_the_ID();
$menu = 'header__menu';

$param = isset($args['param']) ? $args['param'] : null;
$bg = ($param === 'bg-white') ? '#fff' : '#F7F9FA';


?>
<!doctype html>
<html lang="en">

<head>


    <!-- Google tag (gtag.js) -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-1JQYNE9T3Q"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-1JQYNE9T3Q');
	</script>-->
    <!-- End Google Tag -->

    <!--<script type='text/javascript'>
	setTimeout(function(){
		var fc_JS = document.createElement('script');
		fc_JS.type = 'text/javascript';
		fc_JS.src = 'https://brixx.freshchat.com/js/widget.js?t=' + Date.now();
		document.head.appendChild(fc_JS);
		window.fcSettings = {
			token: '168c4c7d-325d-4f90-be69-d6cf06f1cc53',
			host: 'https://brixx.freshchat.com'
		};
	}, 3000); // 3000 milliseconds delay
	</script>-->

    <!-- Matomo -->
    <!--<script>
	  var _paq = window._paq = window._paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
		var u="https://brixx.matomo.cloud/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '1']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.async=true; g.src='//cdn.matomo.cloud/brixx.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<script src="https://brixx.matomo.cloud/plugins/HeatmapSessionRecording/tracker.min.js"></script>-->
    <!-- End Matomo Code -->

    <meta name="google-site-verification" content="UPFJlZRNntuRQhhxbiYw5OB94ArS_TC1R-ByIvoTK2w" />
    <meta name="google-site-verification" content="mmOt8_MOS9hRE2o2x_tr3-DBH1YCkQVu-Ku_uWkXabM" />
    <meta name="ahrefs-site-verification" content="10379542fe39ed638706cbacee20ebe68c0df12fea2635a4e1a01b9fe9d9ddcc">
    <meta name="msvalidate.01" content="9A5686F848BB3B24290E7BB81BE21BE2" />
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        /* cyrillic-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7qsDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7jsDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7rsDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7ksDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7osDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7psDJB9cme_xc.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7nsDJB9cme.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNa7lujVj9_mf.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qPK7lujVj9_mf.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNK7lujVj9_mf.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qO67lujVj9_mf.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qN67lujVj9_mf.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNq7lujVj9_mf.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7lujVj9w.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmhdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwkxdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmxdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlBdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmBdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmRdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlxdu3cOWxw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmhdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwkxdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmxdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlBdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmBdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmRdu3cOWxy40.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(/wp-content/themes/brixx/fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlxdu3cOWxw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
        <script src="https://cdn.tailwindcss.com"></script>


    <?php wp_head(); ?>

</head>
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-wrapper {
        align-items: center;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: fit-content;
        height: 100%;
        object-fit: cover;
    }

    html {
        margin-top: 0 !important;
         /* font-size: 1rem;  */
    }

    .gt-current-lang {
        min-width: 70px !important;
    }

    .gt_float_switcher {
        font-size: 16px !important;
        color: #424A5D !important;
        display: inline-block;
        line-height: 20px;
        box-shadow: unset !important;
        background: transparent !important;
        overflow: hidden;
        transition: all .5s cubic-bezier(0.4, 0, 1, 1);
    }

    .gt-selected {
        background: transparent !important;
    }

    .gt_float_switcher .gt_options.gt-open {
        z-index: 100;
        background: white;
        width: max-content;
    }

    .stroke-text {
        text-shadow:
            -1px -1px 0 white,
            1px -1px 0 white,
            -1px 1px 0 white,
            1px 1px 0 white;
    }

    ul.submenu {
        position: absolute;
        z-index: 200;
        width: 330px;
    }

    ul.submenu li{
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    .hover-link:hover {
        background-color: transparent !important;
    }
</style>

<body class="<?= is_singular('brixx_news') ? 'brixx-news single-page ' : ''; ?>preload page-id-<?= $ID; ?>">
    <div class="h-[80px] lg:h-[82px] bg-[<?= $bg; ?>]"></div>
    <header class="w-full bg-[<?= $bg; ?>] z-[99] fixed top-0">
        <div class="w-full max-w-[1442px] mx-auto py-5 flex justify-between px-4 2xl:px-0">
            <div class="flex flex-1 items-center gap-4 2xl:gap-[34px] w-full xl:w-fit justify-between xl:justify-start">
			<!-- BUSINESS DOCTOR LOGO OVERRIDE -->
			<?php if ( is_page( 20143 ) ) : ?>
				<a href="/">
					<img src="/wp-content/uploads/2024/08/Business-Doctors-New.png" alt="Business Doctors Logo" width="120" height="38" class="w-[120px] h-[38px]" style="max-width: 116px;">
				</a>
			<?php else : ?>
				<a href="/">
					<img src="/wp-content/uploads/2024/10/Website-logo-1.svg" alt="logo" width="120" height="38" class="w-[120px] h-[38px]" style="max-width: 116px;">
				</a>
			<?php endif; ?>
			<!-- LOGO OVERRIDE END -->
                <nav class="absolute left-0 top-full w-full bg-white text-center py-3 px-4 overflow-auto overscroll-none max-h-[calc(100vh-80px-32px)] lg:max-h-[calc(100vh-90px-32px)] transition-[visibility,opacity] duration-300 before:fixed before:bottom-0 before:left-0 before:right-0 before:top-[90px] before:z-[-1] before:bg-[#FAF9FE]/60 before:backdrop-blur-sm xl:visible xl:relative xl:top-0 xl:min-h-0 xl:w-auto xl:bg-transparent xl:opacity-100 xl:duration-0 xl:before:hidden xl:max-h-auto xl:overflow-visible xl:p-0 invisible opacity-0 js-menu">
                    <ul class="text-[#424A5D] flex flex-col xl:flex-row gap-1 2xl:gap-3 font-semibold text-base xl:text-[15px] 2xl:text-base">
                        <?php while (have_rows($menu, 'option')): the_row();
                            $hasSubMenu = get_sub_field('has-sub-menu');
                            $link = get_sub_field('link');
                            $subMenu = 'sub-menu';
                        ?>
                            <?php if (!$hasSubMenu): ?>
                                <li class="py-1.5 xl:px-1 2xl:px-2 flex flex-col items-end xl:block">
                                    <a href="<?= esc_url($link['url']); ?>" class="<?= $currentUrl === $link['url'] ? 'active-menu-item' : ''; ?>" target="<?= esc_attr($link['target']); ?>">
                                        <?= esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="py-1.5 xl:px-1 2xl:px-2 flex flex-col items-end xl:block hover-link group">
                                    <!-- desktop link -->
                                    <a href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target']); ?>" data-dropdown-head class="hidden xl:flex items-center">
                                        <?= esc_html($link['title']); ?>
                                        <svg class="bi bi-arrow-down-short" fill="currentColor" height="16"
                                            viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"
                                                fill-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <!-- mobile link -->
                                    <a href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target']); ?>" data-dropdown-head class="flex xl:hidden items-center js-menu-link">
                                        <?= esc_html($link['title']); ?>
                                        <svg class="bi bi-arrow-down-short" fill="currentColor" height="16"
                                            viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"
                                                fill-rule="evenodd" />
                                        </svg>
                                    </a>

                                    <?php if (have_rows($subMenu)): ?>
                                        <ul class="submenu hidden text-sm relative text-right xl:text-base xl:text-left xl:absolute xl:!hidden xl:group-hover:!block js-menu-submenu py-4 bg-white" data-dropdown-body>
                                            <?php while (have_rows($subMenu)): the_row();
                                                $link = get_sub_field('link');
                                                $icon = (get_sub_field('icon')) ? get_sub_field('icon') : '/wp-content/uploads/2024/10/Menu-item-icon-Business-Planning.png';
                                            ?>
                                                <?php if ($link): ?>
                                                    <li class="!mx-0 bg-transparent xl:px-4 py-4 xl:bg-white">
                                                        <img src="<?php echo $icon; ?>" alt="" class="submenu-icon w-7 h-7 xl:w-9 xl:h-9">
                                                        <a href="<?= esc_url($link['url']); ?>" class="<?= $currentUrl === $link['url'] ? 'active-menu-item' : ''; ?>" target="<?= esc_attr($link['target']); ?>">
                                                            <?= esc_html($link['title']); ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </nav>

                <button type="menu" class="xl:hidden p-1  rounded js-menu-burger" id="burger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden sm:flex items-center justify-end gap-2 min-w-[315px]">
                <?php
                if (has_nav_menu('language-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'language-menu',
                        'container'      => 'div',
                        'container_class' => 'language-menu-container',
                        'menu_class'     => 'language-menu',
                        'fallback_cb'    => false,
                    ));
                }
                ?>
                <div class="flex items-center gap-12 ml-32 2xl:min-w-[245px] justify-end">
                    <a target="blank" href="https://app.brixx.com/" class="text-[#424A5D] transition-transform hover:scale-105 font-semibold hidden sm:block text-base">Log In</a>
                    <!--<button type="button" class="bg-[#FF4713] text-white font-medium rounded-sm py-[13px] px-[30px] transition-transform hover:scale-105">Start for FREE</button>-->
                    <a href="https://app.brixx.com/sign-up/trial?utm_source=split_test&utm_campaign=headercta" class="inline-block">
                        <button type="button" class="bg-[#FF4713] text-white font-medium rounded-sm py-[13px] px-[30px] transition-transform hover:scale-105">
                            Start for FREE
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main>