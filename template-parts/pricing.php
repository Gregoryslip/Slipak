<?php

    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $items = get_sub_field('pricing');
    $showFooter = get_sub_field('show-footer');
    $showCompareLink = get_sub_field('show-compare-link');
    $footer = get_sub_field('footer');
	$headingh2 = get_sub_field('heading_h2');
    $compareBtn = HOME_URL . '/pricing/#compare-features';

    if(is_array($items) && count($items)):
        $countItems = count($items);

    foreach($items as $item){
        $ID = $item->ID;
    }

    $pricing = get_field('pricing__pricing', $ID);
    $free = get_field('free', $ID);
    $premium = get_field('premium', $ID);
    $view_features = get_field('view-features', $ID);

?>

    <section id="pricing" class="pricing" currency="gbp">
        <div class="content">
			<?php
			if ($headingh2) {
				echo "<h2>{$title}</h2>";
			} else {
				echo "<h1>{$title}</h1>";
			}
			?>
            <?= $content ?>
        </div>
        <div class="boxes row between">

            <!-- Free -->
            <div class="box row col free">
                <div class="row between middle">
                    <label><?= $free['label']; ?></label>
                </div>
                <div class="price-row row middle">
                    <div class="price">0</div>
                    <div class="price-description"><?= $free['expiration']; ?></div>
                </div>
                <div class="description row">
                    <?= $free['description']; ?>
                    <div class="details row col bottom">
                        <a href="<?=$view_features['link']; ?>"><?=$view_features['button']; ?></a>
                    </div>
                </div>
                <p class="note"><?= $free['details']; ?></p>
                <div class="button row col middle">
                    <a href="<?= $free['cta']['url']; ?>" class="btn btn-orange btn-empty"><?= $free['cta']['button']; ?></a>
                    <p class="note"><?= $free['footnote']; ?></p>
                </div>
            </div>

            <!-- Premium -->
            <div class="box row col premium">
                <div class="row between middle">
                    <label><?= $premium['label']; ?></label>
                    <div class="controls row middle">
                        <div class="switch">
                            <span>Monthly</span>
                            <input type="checkbox" id="period"></input>
                            <span>Annually</span>
                            <!--<label><?//= $premium['savings']; ?></label>-->
							<label id="savings-label"><?= $premium['savings']; ?></label>
                        </div>
                        <div class="select">
                            <select id="currency">
                                <option value="gbp">GBP</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="cad">CAD</option>
                                <option value="aud">AUD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="price-row row middle">
                    <div class="price price-value"><?= number_format($pricing['gbp-m'], 2, '.', ''); ?></div>
                    <div class="price-description">/month, billed <span class="period-value">monthly</span> at <strong class="billed-value"><?= number_format($pricing['gbp-m'], 2, '.', ''); ?></strong></div>
                </div>
                <div class="description row">
                    <?= $premium['description']; ?>
                    <div class="details row col between bottom">
                        <a href="<?=$view_features['link']; ?>"><?=$view_features['button']; ?></a>
                        <p><?= $premium['details']; ?> <br><label><?= $pricing['gbp-m-extra-plan']; ?></label></p>
                    </div>
                </div>
                <?php

                    $attributes = "";

                    $attributes .= 'gbp-monthly="'.$pricing['gbp-m'].'" ';
                    $attributes .= 'gbp-annually="'. $pricing['gbp-a'].'" ';
                    $attributes .= 'usd-monthly="'.$pricing['usd-m'].'" ';
                    $attributes .= 'usd-annually="'. $pricing['usd-a'].'" ';
                    $attributes .= 'eur-monthly="'.$pricing['eur-m'].'" ';
                    $attributes .= 'eur-annually="'. $pricing['eur-a'].'" ';
                    $attributes .= 'cad-monthly="'.$pricing['cad-m'].'" ';
                    $attributes .= 'cad-annually="'. $pricing['cad-a'].'" ';
                    $attributes .= 'aud-monthly="'.$pricing['aud-m'].'" ';
                    $attributes .= 'aud-annually="'. $pricing['aud-a'].'" ';

                    $attributes .= 'gbp-monthly-extra-plan="'.$pricing['gbp-m-extra-plan'].'" ';
                    $attributes .= 'gbp-annually-extra-plan="'. $pricing['gbp-a-extra-plan'].'" ';
                    $attributes .= 'usd-monthly-extra-plan="'.$pricing['usd-m-extra-plan'].'" ';
                    $attributes .= 'usd-annually-extra-plan="'. $pricing['usd-a-extra-plan'].'" ';
                    $attributes .= 'eur-monthly-extra-plan="'.$pricing['eur-m-extra-plan'].'" ';
                    $attributes .= 'eur-annually-extra-plan="'. $pricing['eur-a-extra-plan'].'" ';
                    $attributes .= 'cad-monthly-extra-plan="'.$pricing['cad-m-extra-plan'].'" ';
                    $attributes .= 'cad-annually-extra-plan="'. $pricing['cad-a-extra-plan'].'" ';
                    $attributes .= 'aud-monthly-extra-plan="'.$pricing['aud-m-extra-plan'].'" ';
                    $attributes .= 'aud-annually-extra-plan="'. $pricing['aud-a-extra-plan'].'" ';
                    
                ?>
                <div class="plans" plans="1 plan" <?= $attributes; ?>>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="bar"></div>
                    <div class="slider"></div>
                </div>
                <div class="plans-value">1 Plan</div>
				<div class="button row col middle">
					<a href="#" class="btn btn-orange">
						<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="6 6 52 52" x="0px" y="0px" fill="#fff">
							<path d="M55.903,26.74l-2.072-11.572c-.454-2.536-2.463-4.545-4.999-4.999l-11.572-2.072c-2-.356-4.036,.286-5.466,1.716L9.812,31.794c-1.169,1.169-1.812,2.723-1.812,4.375s.644,3.206,1.812,4.375l13.644,13.644c1.169,1.169,2.723,1.812,4.375,1.812s3.206-.644,4.375-1.812l21.981-21.981c1.431-1.431,2.072-3.474,1.716-5.466Zm-12.903-2.74c-1.657,0-3-1.343-3-3s1.343-3,3-3,3,1.343,3,3-1.343,3-3,3Z"/>
						</svg>
						<?= $premium['cta']['button']; ?></a>
					<p class="note"><?= $premium['footnote']; ?></p>
				</div>
            </div>

        </div>

        <?php if($showFooter):
            $btn = $footer['button'];
        ?>
            <div class="pricing__foot">
                <div class="pricing__left">
                    <h4><?= $footer['title']; ?></h4>
                    <p><?= $footer['description']; ?></p>
                </div>

                <?php if($btn): ?>
                    <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn"><?= $btn['title']; ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($showCompareLink): ?>
            <div class="pricing__foot-link">
                <a href="<?= $compareBtn; ?>">Compare all our options & prices</a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>