<?php
$options = get_sub_field('options');
$title = get_sub_field('title');
$content = get_sub_field('content');
$link = get_sub_field('link');
$img = get_sub_field('image');
$comment = get_sub_field('comment');
$override_link = get_sub_field('override_link_styling');
?>
<section class="text-with-img">
    <div <?php if ($override_link): ?>id="override-links"<?php endif; ?> class="text-with-img__text">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <?= $content; ?>

        <?php if($link): ?>
            <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
        <?php endif; ?>
    </div>

    <div class="text-with-img__wrapper">
        <?php if($comment): ?>
            <div class="text-with-img__comment comment">
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

        <div class="text-with-img__img">
            <?= wp_get_attachment_image($img['id'], [506, 566]); ?>
        </div>
    </div>
</section>