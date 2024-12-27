<?php
$title = get_sub_field('title');
$content = get_sub_field('content');
$infoItems = get_sub_field('info-items');
$comment = get_sub_field('comment');
$btn = get_sub_field('button');
?>
<section class="info">
    <div class="info__outer">
        <div class="info__text">
            <?php if($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>
            <?= $content; ?>
        </div>
        <div class="info__inner">
            <?php if(count($infoItems)): ?>
                <?php foreach ($infoItems as $infoItem): ?>
                    <div class="info__card">
                        <h4><?= $infoItem['title']; ?></h4>
                        <h5><?= $infoItem['subtitle']; ?></h5>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($comment && !empty($comment['comment']) && !empty($comment['author'])): ?>
                <div class="info__comment comment">
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
    </div>

    <?php if($btn): ?>
        <div class="info__footer">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
        </div>
    <?php endif; ?>
</section>