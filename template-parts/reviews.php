<?php
$title = get_sub_field('title');
$items = get_sub_field('items');
?>
<section class="our-customers">
    <div class="our-customers__outer">
        <?php if($title): ?>
            <div class="our-customers__title">
                <h2><?= $title; ?></h2>
            </div>
        <?php endif; ?>
        <?php if(count($items)): ?>
            <div class="our-customers__inner">
                <div class="our-customers__arrow our-customers__left">
                    <svg height="48" fill="#ff4713" viewBox="0 0 48 48" width="48"
                                               xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.17 32.92l9.17-9.17-9.17-9.17 2.83-2.83 12 12-12 12z" />
                        <path d="M0-.25h48v48h-48z" fill="none" />
                    </svg>
                </div>
                <div class="our-customers__wrapper">
                    <?php foreach ($items as $item): ?>
                        <div class="our-customers__item">
                            <h3><?= $item['title']; ?></h3>
                            <p><?= $item['review']; ?></p>
                            <p><strong><?= $item['author']; ?></strong></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="our-customers__arrow our-customers__right">
                    <svg height="48" fill="#ff4713" viewBox="0 0 48 48" width="48"
                                               xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.17 32.92l9.17-9.17-9.17-9.17 2.83-2.83 12 12-12 12z" />
                        <path d="M0-.25h48v48h-48z" fill="none" />
                    </svg>
                </div>
            </div>
            <div class="our-customers__footer">
                <div class="our-customers__dots"></div>
            </div>
        <?php endif; ?>
    </div>
</section>