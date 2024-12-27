<?php
$items = get_sub_field('items');
$counter = 0;
?>
<?php if(count($items)): ?>
    <section class="text-with-img-1">
        <div class="text-with-img-1__overlay">
<!--            <img class="lazy" width="1920" height="400" data-src="--><?//= THEME_URL; ?><!--/assets/image/backgrounds/steps-bg.png" alt="background">-->
        </div>
        <div class="text-with-img-1__outer">
            <?php foreach ($items as $item):
                $counter++;
            ?>
                <div class="text-with-img-1__item <?= $counter%2 === 0? 'text-with-img-1__item--reverce' : ''; ?>">
                    <div class="text-with-img-1__inner">
                        <div class="text-with-img-1__bg">
                            <img class="lazy" width="1122" height="377" data-src="<?= THEME_URL; ?>/assets/image/backgrounds/text-with-img-bg.png" alt="background">
                        </div>
                        <div class="text-with-img-1__text">
						<?php 
						$make_title_h3 = $item['make_title_h3'];
						if($item['title']): 
							if($make_title_h3): ?>
								<h3><?= $item['title']; ?></h3>
							<?php else: ?>
								<h2><?= $item['title']; ?></h2>
							<?php endif; ?>
						<?php endif; ?>
							<div class="text-with-img-1__text__inner">
                            <?= $item['content']; ?>
							</div>
                            <?php if($item['link']): ?>
								<div class="text-with-img-1__link">
                                	<a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>"><?= $item['link']['title']; ?></a>
								</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="text-with-img-1__img">
                        <?= wp_get_attachment_image($item['image']['id'], [496, 334]); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>