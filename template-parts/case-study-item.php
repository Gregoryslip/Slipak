<?php
$title = get_sub_field('title');
$post = get_sub_field('post');
?>
<?php if($post):
    $icon = get_field('customer-story__icon', $post);
    $options = get_field('customer-story__options', $post);
    $options = $options? implode( ' ', $options) : false;
    $thumbnail = get_field('customer-story__thumbnail', $post);
    $titlePost = get_field('customer-story__title', $post);
    $description = get_field('customer-story__description', $post);
    $author = get_field('customer-story__author', $post);
    $link = get_the_permalink($post);
?>
    <section class="text-item-with-tag <?= $options; ?>">
        <div class="text-item-with-tag__outer">
            <div class="text-item-with-tag__img">
                <?= wp_get_attachment_image($thumbnail['id'], [500, 410]); ?>
                <div class="text-item-with-tag__logo">
                    <div class="text-item-with-tag__icon">
                        <?= wp_get_attachment_image($icon['id'], [154, 154]); ?>
                    </div>
                </div>
            </div>
                <div class="text-item-with-tag__text">
                    <div class="text-item-with-tag__wrapper">
                        <?php if($title): ?>
                            <h2><?= $title; ?></h2>
                        <?php endif; ?>
                        <h3><?= $titlePost; ?></h3>
                        <p><?= $description; ?></p>
                        <strong><?= $author; ?></strong>
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
                    <a href="<?= $link; ?>">Read the full case study</a>
                </div>
        </div>
    </section>
<?php
wp_reset_query();
endif; ?>