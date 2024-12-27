<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$buttons = get_sub_field('buttons');
?>
<section class="cta-1 cta-1--larger-paddings">
    <div class="cta-1__inner">
        <?php if($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>
        <p><?= $description ?></p>
        <?php if(count($buttons)): ?>
            <div class="cta-1__wrapper">
                <?php foreach ($buttons as $btn): ?>
                    <a href="<?= $btn['button']['url']; ?>" target="<?= $btn['button']['target']; ?>" class="btn <?= $btn['button-color']; ?>"><?= $btn['button']['title']; ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>