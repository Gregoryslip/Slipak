<?php
$currentCat = isset($args['cat'])? $args['cat'] : false;
$currentID = $currentCat? $currentCat->term_id : 0;
$withoutActive = isset($args['without_active'])? $args['without_active'] : false;
$args = [
    'taxonomy' => 'category',
    'hide_empty' => true
];
$counter = 0;
$categories = get_terms($args);
$countCat = count($categories);
?>
<div class="archive__links">
    <ul>
        <li class="<?= !$currentCat && !$withoutActive? 'active-link' : ''; ?>"><a href="<?= HOME_URL; ?>/blog/">View All</a></li>
        <?php if($categories): ?>
            <?php foreach ($categories as $cat):
                $counter++;
            ?>
                <li class="<?= $cat->term_id === $currentID? 'active-link' : ''; ; ?>">
                    <a href="<?= get_term_link($cat, 'category'); ?>">
                        <?= $cat->name; ?>
                    </a>
                </li>
                <?php if($counter >= 6){ break; } ?>
            <?php endforeach;
                $counter = 0;
            ?>

            <?php if($countCat > 6): ?>
                <li data-dropdown-status="close" data-working-range="0 9999" class="hover-link">
                    <span data-dropdown-head>More
                       <svg class="bi bi-arrow-down-short" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" fill-rule="evenodd" />
                        </svg>
                    </span>
                    <ul class="submenu" data-dropdown-body>
                        <?php foreach ($categories as $cat):
                            $counter++;
                            if($counter <=6 ){
                                continue;
                            }
                        ?>
                            <li class="<?= $cat->term_id === $currentID? 'active-link' : ''; ; ?>">
                                <a href="<?= get_term_link($cat, 'category'); ?>">
                                    <?= $cat->name; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</div>