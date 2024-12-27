<?php
    $content = get_sub_field('content');
    $icon = get_sub_field('icon');
    $title = get_sub_field('title');
    $subtitle = get_sub_field('subtitle');
    $items = get_sub_field('items');
    $btn = get_sub_field('button');

    if(is_array($items)):
?>

    <section id="faq-alternate">
        <?php
            if($content)
                echo '<div class="content">'.$content.'</div>';
        ?>
        <div class="heading row nowrap bottom">
            <div class="row nowrap top">
                <?php if($icon) echo '<img src="'.$icon.'">'; ?>
                <div class="text">
                    <h2><?= $title; ?></h2>
                    <p><?= $subtitle; ?></p>
                </div>
            </div>
            <div class="expand-all">
                <span id="expand">Expand All</span>
                <span id="collapse">Close All</span>
            </div>
        </div>

        <div class="faq">
            <?php
                foreach ($items as $item){
                    $ID = $item->ID;
                    $title = get_the_title($ID);
                    $content = get_field('faq__content', $ID);

                    echo '<div class="item">
                            <div class="question">'.$title.'</div>
                            <div class="answer"><span>'.$content.'</span></div>
                        </div>';

                }
            ?>
        </div>

        <?php if($btn): ?>
            <div class="button row center">
                <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>