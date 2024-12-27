<?php
$options = get_sub_field('options');
$options = $options? implode(' ', $options) : false;
$image = get_sub_field('image');
$title = get_sub_field('title');
$content = get_sub_field('content');
$selectbox = get_sub_field('selectbox');
?>
<section class="text-with-select <?= $options; ?>">
    <?php if($image): ?>
        <div class="text-with-select__items">
            <?= wp_get_attachment_image($image['id'], [328, 459]); ?>
        </div>
    <?php endif; ?>

    <div class="text-with-select__text">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <?= $content; ?>

        <?php if($selectbox):
            $items = $selectbox['items'];
        ?>
            <?php if(is_array($items) && count($items) > 1): ?>
                <div class="text-with-select__inner">
                    <h3><?= $selectbox['title']; ?></h3>

                    <form action="#" class="text-with-select__wrapper">
                        <div class="text-with-select__select select">
                            <select name="bussines-type" id="select">
                                <option value="Choose your business size" hidden>Choose your business size</option>
                                <?php foreach ($items as $item): ?>
                                    <option value="<?= $item['url']; ?>" data-link="<?= $item['url']; ?>"><?= $item['text']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <a href="#" class="btn btn--orange-border d-none" id="find-more"><?= $selectbox['button-text']; ?></a>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>