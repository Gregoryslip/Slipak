<?php
$cat = isset($args['cat'])? $args['cat'] : false;
$ID = get_the_ID();
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'post__not_in' => [$ID],
    'cat' => $cat->term_id
];
$query = new WP_Query($args);
?>
<?php if($query->have_posts()): ?>
    <div class="archive__popular article__list">
        <h3>Related articles</h3>
        <ul>
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <li>
                    <a href="<?= get_the_permalink(); ?>">
                        <?= get_the_title(); ?>
                    </a>
                </li>
            <?php endwhile;
                wp_reset_query();
            ?>
        </ul>
    </div>
<?php endif; ?>