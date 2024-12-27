<?php
$title = get_sub_field('title');
$subTitle = get_sub_field('subtitle');
$btn = get_sub_field('button');
$steps = get_sub_field('steps');
$counter = 0;
?>
<?php if(count($steps)): ?>
    <section class="steps">
        <div class="steps__bg">
<!--            <img class="lazy" width="1920" height="400" data-src="--><?//= THEME_URL; ?><!--/assets/image/backgrounds/steps-bg.png" alt="background">-->
        </div>
        <div class="steps__title">
            <?php if($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>

            <?php if($subTitle): ?>
                <p><?= $subTitle; ?></p>
            <?php endif; ?>
        </div>

        <div class="steps__inner">
            <?php foreach ($steps as $step):
                $title = $step['title'];
                $subtitle = $step['subtitle'];
                $content = $step['content'];
                $counter++;
            ?>
                <div class="steps__item">
                    <div class="steps__number">
                        <?= $counter; ?>
                    </div>
                    <div class="steps__text">
                        <h3><?= $title; ?></h3>

                        <?php if($subtitle): ?>
                            <h5><?= $subtitle; ?></h5>
                        <?php endif; ?>

                        <?php if($content): ?>
                            <p><?= $content; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if($btn): ?>
            <div class="steps__foot">
                <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>