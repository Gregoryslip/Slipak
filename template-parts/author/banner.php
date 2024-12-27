<?php
$author = isset($args['author'])? $args['author'] : false;
?>
<section class="hero-small  hero-small--small">
    <div class="hero-small__inner">
        <div class="hero-small__text">
            <p class="hero-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56">
                    <defs>
                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                            <path d="M0 42h42V0H0z" />
                        </clipPath>
                    </defs>
                    <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 56)">
                        <path fill="#f26c52"
                              d="M28.2 23.3c-.7-.7-2-.7-2.7 0l-2.4 2.4c-.7.7-.7 2 0 2.7.7.7 2 .7 2.7 0l2.4-2.4c.8-.8.8-2 0-2.7m-.9-8.6c-.7-.7-2-.7-2.7 0l-10 10c-.7.7-.7 2 0 2.7.7.7 2 .7 2.7 0l10-10c.8-.7.8-2 0-2.7m-8.6-1c-.7-.7-2-.7-2.7 0l-2.4 2.4c-.7.7-.7 2 0 2.7.7.7 2 .7 2.7 0l2.4-2.4c.8-.7.8-1.9 0-2.7M21 42C9.4 42 0 32.6 0 21S9.4 0 21 0s21 9.4 21 21-9.5 21-21 21" />
                    </g>
                </svg>
                Author
            </p>
            <h1><?= $author->name; ?></h1>
        </div>
    </div>
    <div class="hero-small__img">
        <img width="1920" height="420" src="<?= THEME_URL; ?>/assets/image/hero/partnership-single.png" alt="Background image">
    </div>
</section>