<?php
$cta = get_field('single-article__cta');
$cta = $cta['title'] && $cta['description']? $cta : get_field('single-article__cta', 'option');
$title = $cta['title'];
$description = $cta['description'];
$btn = $cta['button'];
?>
<section class="cta-1">
    <div class="cta-1__inner">
        <h2><?= $title; ?></h2>
        <p><?= $description; ?></p>
        <?php if($btn): ?>
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
        <?php endif; ?>
    </div>
</section>