<?php
$postType = isset($args['post_type'])? $args['post_type'] : '';
$industries = get_terms_by_cpt('industry-experience', ['post_type' => $postType]);
$locations = get_terms_by_cpt('locations', ['post_type' => $postType]);
$services = get_terms_by_cpt('service-type', ['post_type' => $postType]);
?>
<section class="categories">
    <div class="categories__flex">
        <div class="categories__selects">
            <?php if($industries): ?>
                <div class="categories__select">
                    <select name="industry-experience">
                        <option value="" disabled selected>Industry Experience</option>
                        <?php foreach ($industries as $industry): ?>
                            <option value="<?= $industry->term_id; ?>"><?= $industry->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
            <?php if($locations): ?>
                <div class="categories__select">
                    <select name="locations">
                        <option value="" disabled selected>Location</option>
                        <?php foreach ($locations as $location): ?>
                            <option value="<?= $location->term_id; ?>"><?= $location->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
            <?php if($services): ?>
                <div class="categories__select">
                    <select name="services-type">
                        <option value="" disabled selected>Type of Services</option>
                        <?php foreach ($services as $service): ?>
                            <option value="<?= $service->term_id; ?>"><?= $service->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
        <div class="categories__btn">
            <a href="#" data-tax-filter class="btn btn--orange">SEARCH</a>
        </div>
    </div>
</section>