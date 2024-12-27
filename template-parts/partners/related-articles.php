<?php
global $post;
$link = isset($args['button'])? $args['button'] : false;
$post_type = isset($args['post_type'])? $args['post_type'] : false;
$industries = get_the_terms($post, 'industry-experience');
$locations = get_the_terms($post, 'locations');
$services = get_the_terms($post, 'service-type');

$industry = $industries? $industries[0]->term_id : false;
$location = $locations? $locations[0]->term_id : false;
$service = $services? $services[0]->term_id : false;
$taxQuery = [
    'relation' => 'OR',
];
if($services){
    $taxQuery[] = [
        'taxonomy' => 'service-type',
        'field' => 'term_id',
        'terms' => [$services[0]->term_id]
    ];
}

if($locations){
    $taxQuery[] = [
        'taxonomy' => 'locations',
        'field' => 'term_id',
        'terms' => [$locations[0]->term_id]
    ];
}

if($industries){
    $taxQuery[] = [
        'taxonomy' => 'industry-experience',
        'field' => 'term_id',
        'terms' => [$industries[0]->term_id]
    ];
}

$args = [
    'post_type' => $post_type,
    'posts_per_page' => 4,
    'posts_status' => 'publish',
    'post__not_in' => [get_the_ID()],
    'tax_query' => $taxQuery
];

$query = new WP_Query($args);
?>
<?php if($query->have_posts()): ?>
    <section class="articles">
        <div class="articles__title">
            <h4>Related articles</h4>
        </div>
        <div class="articles__inner">
            <?php
                while ($query->have_posts()): $query->the_post();
                    get_template_part('template-parts/partners/article-item');
                endwhile;
                wp_reset_query();
            ?>
        </div>
        <?php if($link): ?>
            <div class="articles__foot">
                <a href="<?= $link['url']; ?>" class="btn btn--orange-border"><?= $link['title']; ?></a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>