<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : '';
$useForm = strpos($options, 'use-form');
$smallText = strpos($options, 'small-text');
$useComment = strpos($options, 'use-comment');
$useSmallComment = strpos($options, 'use-small-comment');
$useLargeImage = strpos($options, 'large-image');
$reverseItem = strpos($options, 'reverse-item');
$commentTopPosition = strpos($options, 'comment-position-top');
$img = get_sub_field('image');
$comment = get_sub_field('comment');
$btnColor = get_sub_field('center-button-color');
$form = get_sub_field('form');
$title = get_sub_field('title');
$content = get_sub_field('content');
$btn = get_sub_field('button');
?>
<section class="text-with-item <?= $commentTopPosition? 'text-with-item__comment-top' : ''; ?>  <?= $useSmallComment !== false? 'text-with-item--other-comment' : ''; ?> <?= $useComment === false? 'text-with-item--with-img' : ''; ?> <?= $reverseItem !== false? 'text-with-item--reverce' : ''; ?> <?= $useLargeImage !== false? 'text-with-item--larger-img' : ''; ?> <?= $smallText !== false? 'text-with-item--small-text' : ''; ?> <?= $useForm !== false? 'text-with-item--contact' : ''; ?> plane-text">
    <div class="text-with-item__outer">
        <div class="text-with-item__item">
            <div class="text-with-item__img">
                <?= wp_get_attachment_image($img['id'], [300, 300]); ?>
            </div>
            <?php if($comment['comment']): ?>
                <div class="text-with-item__comment">
                    <p><?= $comment['comment']; ?></p>
                    <strong><?= $comment['author']; ?></strong>
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ff4713">
                                <path
                                    d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ff4713">
                                <path
                                    d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ff4713">
                                <path
                                    d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ff4713">
                                <path
                                    d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#ff4713">
                                <path
                                    d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                            </svg>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-with-item__text">
            <?php if($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>
            <?= $content; ?>
            <?php if($form): ?>
                <div class="form">
                    <?= do_shortcode($form); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if($btn): ?>
        <div class="text-with-item__footer">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn <?= $btnColor; ?>"><?= $btn['title']; ?></a>
        </div>
    <?php endif; ?>
</section>