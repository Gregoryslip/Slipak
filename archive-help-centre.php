<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hashi-sensei
 */

get_header();

$img = get_field("help__centre__banner__image", "option");
$title = get_field("help__centre__banner__title", "option");
$subtitle = get_field("help__centre__banner__subtitle", "option");
$leadingcontent = get_field("help__centre__leading__content", "option");
?>

<section class="hero-small">
    <div class="hero-small__inner">
        <div class="hero-small__text">
            <div class="breadcrumbs">
                <?php get_template_part("template-parts/breadcrumbs"); ?>
            </div>

            <h1><?= esc_html($title) ?></h1>
            <p><?= esc_html($subtitle) ?></p>
        </div>
    </div>
    <div class="hero-small__img">
        <?= wp_get_attachment_image($img["id"], [720, 661], false, [
            "class" => "skip-lazy",
            "loading" => "eager",
        ]) ?>
    </div>
</section>

<section class="single-content article">
    <div class="single-content__wr">
        <div class="help-centre-leading__content">
            <?= wp_kses_post($leadingcontent) ?>
        </div>
        <div class="help-centre-search">
            <form action="<?php echo esc_url(site_url('/')); ?>" method="get">
                <input type="hidden" name="post_type" value="help-centre">
                <input type="text" name="search_help_centre" placeholder="Search Help Centre">
                <input type="submit" value="Search">
            </form>
        </div>

        <?php
        if (isset($_GET['search_help_centre']) && !empty($_GET['search_help_centre'])) {
            $search_term = sanitize_text_field($_GET['search_help_centre']);
            echo '<h2>Search Results</h2>';

            $search_args = array(
                's'              => $search_term,
                'post_type'      => 'help-centre',
                'posts_per_page' => -1,
            );

            $search_query = new WP_Query($search_args);

            if ($search_query->have_posts()) :
                while ($search_query->have_posts()) : $search_query->the_post();
                    $title = get_the_title();
                    $content_found = false;
                    $content = '';

                    if (have_rows('post-builder')) :
                        while (have_rows('post-builder') && !$content_found) : the_row();
                            if (get_row_layout() == 'content') :
                                $block_content = get_sub_field('content');
                                if (stristr($title, $search_term) !== false) {
                                    $content = substr(wp_strip_all_tags($block_content), 0, 200) . '...';
                                    $content_found = true;
                                } else {
                                    $excerpt = get_search_excerpt($block_content, $search_term);
                                    if ($excerpt) {
                                        $content .= $excerpt;
                                        $content_found = true;
                                    }
                                }
                            endif;
                        endwhile;
                    endif;

                    if (!$content_found) {
                        $content = 'No specific content found. Please click to read more.';
                    }
                    ?>
                    <div class="search-result">
                        <h4><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h4>
                        <p><?php echo esc_html($content); ?></p>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found matching your search criteria.</p>';
            endif;

        } else {
            $cat_args = array(
                'taxonomy'     => 'help-centre-categories',
                'parent'       => 0,
                'hide_empty'   => false,
                'hierarchical' => true,
            );

            $categories = get_categories($cat_args);

            if (!empty($categories)) {
                echo '<div class="categories-list">';
                foreach ($categories as $category) {
                    $subcategories = get_categories(array(
                        'taxonomy'   => 'help-centre-categories',
                        'parent'     => $category->term_id,
                        'hide_empty' => false,
                    ));

                    echo '<div class="category-item">';
                    echo "<h2 class='category-toggle'>" . esc_html($category->name) . "</h2>";

                    if (empty($subcategories)) {
                        echo "<div class='category-posts'>";
                        $args = array(
                            'order'          => 'ASC',
                            'orderby'        => 'title',
                            'posts_per_page' => -1,
                            'post_type'      => 'help-centre',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'help-centre-categories',
                                    'field'    => 'slug',
                                    'terms'    => $category->slug,
                                ),
                            ),
                        );

                        $cat_query = new WP_Query($args);

                        if ($cat_query->have_posts()) {
                            while ($cat_query->have_posts()) {
                                $cat_query->the_post(); ?>
                                <h4>
                                    <a href="<?php the_permalink(); ?>"
                                       title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h4>
                            <?php
                            }
                        } else {
                            echo '<h4>No posts in this category</h4>';
                        }

                        wp_reset_postdata();
                        echo "</div>";
                    } else {
                        echo '<div class="subcategories">';
                        foreach ($subcategories as $subcategory) {
                            echo '<h3 class="subcategory-toggle"><strong>' . esc_html($subcategory->name) . '</strong></h3>';
                            echo "<div class='subcategory-posts' style='display: none;'>"; // Ensure subcategories are collapsed initially

                            $sub_args = array(
                                'order'          => 'ASC',
                                'orderby'        => 'title',
                                'posts_per_page' => -1,
                                'post_type'      => 'help-centre',
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'help-centre-categories',
                                        'field'    => 'slug',
                                        'terms'    => $subcategory->slug,
                                    ),
                                ),
                            );

                            $sub_cat_query = new WP_Query($sub_args);

                            if ($sub_cat_query->have_posts()) {
                                while ($sub_cat_query->have_posts()) {
                                    $sub_cat_query->the_post(); ?>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"
                                           title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                <?php
                                }
                            } else {
                                echo '<h4>No posts in this sub-category</h4>';
                            }

                            wp_reset_postdata();
                            echo "</div>";
                        }
                        echo '</div>';
                    }
                    echo '</div>'; // Close category-item
                }
                echo '</div>';
            } else {
                echo '<p>No categories found.</p>';
            }
        }
        ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const categoryToggles = document.querySelectorAll(".category-toggle");
    const subcategoryToggles = document.querySelectorAll(".subcategory-toggle");

    // Toggle category posts
    categoryToggles.forEach(function(toggle) {
        toggle.addEventListener("click", function() {
            const posts = this.nextElementSibling;
            if (posts.style.display === "none" || !posts.style.display) {
                posts.style.display = "block";
                this.classList.add("expanded");
            } else {
                posts.style.display = "none";
                this.classList.remove("expanded");
            }
        });
    });

    // Toggle sub-category posts
    subcategoryToggles.forEach(function(toggle) {
        toggle.addEventListener("click", function() {
            const posts = this.nextElementSibling;
            if (posts.style.display === "none" || !posts.style.display) {
                posts.style.display = "block";
                this.classList.add("expanded");
            } else {
                posts.style.display = "none";
                this.classList.remove("expanded");
            }
        });
    });
});
</script>


<?php get_footer(); ?>
