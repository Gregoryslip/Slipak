<?php
$title = get_sub_field('title');
$tabItems = get_sub_field('tab');
$counter = 0;
?>
<section class="tab">
    <div class="tab__bg">
        <img class="lazy" width="1920" height="2000" data-src="<?= THEME_URL; ?>/assets/image/backgrounds/background-pattern-large.png" alt="background">
    </div>

    <?php if($title): ?>
        <div class="tab__title">
            <h2><?= $title; ?></h2>
        </div>
    <?php endif; ?>

    <?php if(count($tabItems)): ?>
        <div class="tab__outer">
            <div class="tab__triggers">
                <?php foreach ($tabItems as $tab):
                    $counter++;
                ?>
                    <div class="tab__trigger tab <?= $counter === 1? 'active' : ''; ?> " data-tab-target="#tab-<?= $counter; ?>">
                        <?= $tab['name']; ?>
                    </div>
                <?php endforeach;
                    $counter = 0;
                ?>
            </div>

            <div class="tab__inner">

                <?php foreach ($tabItems as $tab):
                    $counter++;
                    $contentWithComment = $tab['content-with-comment'];
                    $items = $tab['content-with-image']['items'];
                    $cta = $tab['cta'];
                    $innerCounter = 0;
                ?>
                    <div class="tab__tab <?= $counter === 1? 'active' : ''; ?>" id="tab-<?= $counter; ?>" data-tab-content>
                        <?php if($contentWithComment):
                            $title = $contentWithComment['title'];
                            $content = $contentWithComment['content'];
                            $comment = $contentWithComment['comment'];
                            $commentAuthor = $contentWithComment['comment-author'];
                            $img = $contentWithComment['image'];
                            $link = $contentWithComment['link'];
                        ?>
                            <div class="text-with-img-card">
                                <div class="text-with-img-card__text">
                                    <?php if($title): ?>
                                        <h2><?= $title; ?></h2>
                                    <?php endif; ?>

                                    <?= $content; ?>

                                    <?php if($link): ?>
                                        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                                    <?php endif; ?>

                                    <div class="text-with-img-card__bg">
                                        <img class="lazy" width="710" height="250" data-src="<?= THEME_URL; ?>/assets/image/backgrounds/modelling-the-future-bg.png" alt="background">
                                    </div>
                                </div>

                                <div class="text-with-img-card__img">
                                    <?php if($comment && $commentAuthor): ?>
                                        <div class="text-with-img-card__comment comment">
                                            <p><?= $comment; ?></p>
                                            <strong><?= $commentAuthor; ?></strong>
                                            <ul>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         fill="#ff4713">
                                                        <path
                                                            d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         fill="#ff4713">
                                                        <path
                                                            d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         fill="#ff4713">
                                                        <path
                                                            d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         fill="#ff4713">
                                                        <path
                                                            d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         fill="#ff4713">
                                                        <path
                                                            d="M480 207H308.6L256 47.9 203.4 207H32l140.2 97.9L117.6 464 256 365.4 394.4 464l-54.7-159.1L480 207z" />
                                                    </svg>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <?= $img? wp_get_attachment_image($img['id'], [437, 250]) : ''; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="text-with-img-2">
                            <?php if(is_array($items)): ?>
                                <?php foreach ($items as $item):
                                    $title = $item['title'];
                                    $content = $item['content'];
                                    $link = $item['link'];
                                    $img = $item['image'];
                                    $innerCounter++;
                                ?>
                                    <div class="text-with-img-2__item <?= $innerCounter%2? 'text-with-img-2__item--reverce' : ''; ?>">
                                        <div class="text-with-img-2__text">
                                            <?php if($title): ?>
                                                <h2><?= $title; ?></h2>
                                            <?php endif; ?>
                                            <?= $content; ?>
                                            <?php if($link): ?>
                                                <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-with-img-2__img">
                                            <?= $img? wp_get_attachment_image($img['id'], [433, 176]) : ''; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if(is_array($cta)):
                                $title = $cta['title'];
                                $content = $cta['content'];
                                $link = $cta['link'];
                                $pricesObj = $cta['price'];
                                $countItems = 0;
                                $countItems = is_array($pricesObj)? count($pricesObj) : 0;
                            ?>
                                <div class="text-with-img-3" id="cta-<?= $counter; ?>">
                                    <div class="text-with-img-3__title">
                                        <?php if($title): ?>
                                            <h2><?= $title; ?></h2>
                                        <?php endif; ?>

                                        <?= $content; ?>
                                    </div>

                                    <?php if(is_array($pricesObj) && count($pricesObj) === 1): ?>
                                        <?php foreach ($pricesObj as $priceObj):
                                            $ID = $priceObj->ID;
                                            $title = get_the_title($ID);
                                            $description = get_field('pricing__description', $ID);
                                            $listItems = get_field('pricing__items', $ID);
                                            $pricing = get_field('pricing__pricing', $ID);
                                            $gbpM = $pricing['gbp-m'];
                                            $btn = get_field('pricing__button', $ID);
                                        ?>
                                            <div class="text-with-img-3__outer">
                                                <div class="text-with-img-3__left">
                                                    <h3>Brixx <strong><?= $title; ?></strong> </h3>
                                                    <p><?= $description; ?></p>
                                                </div>
                                                <div class="text-with-img-3__inner">
                                                    <div class="text-with-img-3__list">
                                                        <?php if(is_array($listItems) && count($listItems) > 1): ?>
                                                            <ul>
                                                                <?php foreach ($listItems as $listItem):
                                                                    $text = $listItem['item'];
                                                                    ?>
                                                                    <?php if($text): ?>
                                                                    <li>
                                                                        <?= $text; ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="text-with-img-3__wrapper">

                                                        <h4><?= $gbpM? '£' . $gbpM : 'FREE' ?></h4>

                                                        <div class="pricing-card__price-right">
                                                            <div class="pricing-card__per-month">
                                                                <?= $gbpM? 'per month' : ''; ?>
                                                            </div>
                                                        </div>

                                                        <?php if($btn): ?>
                                                            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                                                        <?php endif; ?>

                                                        <?php if($link): ?>
                                                            <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="link"><?= $link['title']; ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php elseif(is_array($pricesObj) && count($pricesObj) > 1): ?>
                                    <section id="pricing-section" class="pricing <?= $countItems === 3? 'pricing--three-col' : ''; ?> <?= $countItems === 2? 'pricing--two-col' : ''; ?>">
                                        <div class="pricing__inner pricing--month" id="pricing-inner">
                                            <?php foreach ($pricesObj as $priceObj):
                                                $ID = $priceObj->ID;
                                                $title = get_the_title($ID);
                                                $isMostPopular = get_field('pricing__most-popular', $ID);
                                                $description = get_field('pricing__description', $ID);
                                                $pricing = get_field('pricing__pricing', $ID);
                                                $text = get_field('pricing__text', $ID);
                                                $subtitle = get_field('pricing__subtitle', $ID);
                                                $listItems = get_field('pricing__items', $ID);
                                                $hasFrom = get_field('pricing__has-from', $ID);
                                                $gbpM = $pricing['gbp-m'];
                                                $usdM = $pricing['usd-m'];
                                                $eurM = $pricing['eur-m'];
                                                $cadM = $pricing['cad-m'];
                                                $audM = $pricing['aud-m'];
                                                $gbpA = $pricing['gbp-a'];
                                                $usdA = $pricing['usd-a'];
                                                $eurA = $pricing['eur-a'];
                                                $cadA = $pricing['cad-a'];
                                                $audA = $pricing['aud-a'];
                                                $content = get_field('pricing__content', $ID);
                                                $findOutMore = get_field('pricing__find-out-more', $ID);
                                                $btn = get_field('pricing__button', $ID);
                                        ?>
                                                <div class="pricing-card " data-gbp-month="<?= $gbpM; ?>" data-gbp-annual="<?= $gbpA; ?>" data-usd-month="<?= $usdM; ?>" data-usd-annual="<?= $usdA; ?>"
                                                     data-eur-month="<?= $eurM; ?>" data-eur-annual="<?= $eurA; ?>" data-cad-month="<?= $cadM; ?>" data-cad-annual="<?= $cadA; ?>" data-aud-month="<?= $audM; ?>"
                                                     data-aud-annual="<?= $audA; ?>">

                                                    <div class="pricing-card__title">
                                                        <?php if($isMostPopular): ?>
                                                            <div class="pricing-card__tag">
                                                                MOST <br> POPULAR
                                                            </div>
                                                        <?php endif; ?>

                                                        <h3>Brixx <strong><?= $title; ?></strong></h3>
                                                        <p><?= $description; ?></p>
                                                        <?php if($findOutMore): ?>
                                                            <a href="<?= $findOutMore['url']; ?>" target="<?= $findOutMore['target']; ?>" class="link"><?= $findOutMore['title']; ?></a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="pricing-card__inner">
                                                        <div class="pricing-card__price <?= !$gbpM? 'pricing-card__price--bold' : ''; ?>">

                                                            <?php if($gbpM): ?>
                                                                <div class="pricing-card__price-place-wrap">
                                                                    <div class="pricing-card__price-left">
                                                                        <?= $hasFrom? 'from' : ''; ?>
                                                                    </div>

                                                                    <div class="center-flex">
                                                                        <div class="pricing-card__price-symbol">£</div>
                                                                        <div class="pricing-card__price-place">
                                                                            <?= $gbpM; ?>
                                                                        </div>
                                                                    </div>
<!--                                                                    <div class="pricing-card__price-symbol">£</div>-->
<!--                                                                    <div class="pricing-card__price-place">-->
<!--                                                                        --><?//= $gbpM; ?>
<!--                                                                    </div>-->
                                                                    <div class="pricing-card__price-right">
                                                                        <div class="pricing-card__per-month">
                                                                            <?= $gbpM? 'per month <br>' : ''; ?>
                                                                        </div>
                                                                        <div class="pricing-card__annually">
                                                                            <?= $gbpM? 'per month <br> Paid Annually' : ''; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php else: ?>
                                                                FREE
                                                            <?php endif; ?>

                                                        </div>
                                                        <h4><?= $text; ?></h4>
                                                        <?php if($subtitle): ?>
                                                            <span><?= $subtitle; ?></span>
                                                        <?php endif; ?>
                                                        <?php if(is_array($listItems) && count($listItems) > 1): ?>
                                                            <ul>
                                                                <?php foreach ($listItems as $listItem):
                                                                    $text = $listItem['item'];
                                                                    $useSelect = $listItem['use-selectbox'];
                                                                    ?>
                                                                    <li>
                                                                        <?php if(!$useSelect): ?>
                                                                            <?= $text; ?>
                                                                        <?php else:
                                                                            $itemsSelectbox = $listItem['selectbox-items']
                                                                            ?>
                                                                            <?php if(is_array($itemsSelectbox) && count($itemsSelectbox) > 1):
                                                                            $counterSelectbox = 0;
                                                                            ?>
                                                                            <div class="select">
                                                                                <select>
                                                                                    <?php foreach ($itemsSelectbox as $itemSelectbox):
                                                                                        $name = $itemSelectbox['name'];
                                                                                        $gbpMs = $itemSelectbox['gbp-m'];
                                                                                        $usdMs = $itemSelectbox['usd-m'];
                                                                                        $eurMs = $itemSelectbox['eur-m'];
                                                                                        $cadMs = $itemSelectbox['cad-m'];
                                                                                        $audMs = $itemSelectbox['aud-m'];
                                                                                        $gbpAs = $itemSelectbox['gbp-a'];
                                                                                        $usdAs = $itemSelectbox['usd-a'];
                                                                                        $eurAs = $itemSelectbox['eur-a'];
                                                                                        $cadAs = $itemSelectbox['cad-a'];
                                                                                        $audAs = $itemSelectbox['aud-a'];
                                                                                        $counterSelectbox++;
                                                                                        ?>
                                                                                        <option name="month-annual" data-gbp-month-value="<?= $gbpMs; ?>"
                                                                                                data-gbp-annual-value="<?= $gbpAs; ?>" data-usd-month-value="<?= $usdMs; ?>"
                                                                                                data-usd-annual-value="<?= $usdAs; ?>" data-eur-month-value="<?= $eurMs; ?>"
                                                                                                data-eur-annual-value="<?= $eurAs; ?>" data-cad-month-value="<?= $cadMs; ?>"
                                                                                                data-cad-annual-value="<?= $cadAs; ?>" data-aud-month-value="<?= $audMs; ?>"
                                                                                                data-aud-annual-value="<?= $audAs; ?>" <?= $counterSelectbox === 1? 'selected' : ''; ?>><?= $name; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>

                                                        <div class="pricing-card__btn-wrapper">
                                                            <?php if($btn): ?>
                                                                <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </section>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>