<?php

// YOAST BREADCRUMB FIX
add_filter('wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_fix');

function yoast_seo_breadcrumb_fix($links) {
    global $post;

    if (is_singular('accounts-advisors')) {
        $new_links = [
            [
                'text' => 'Brixx Partnerships',
                'url'  => 'https://brixx.com/brixx-partnerships/',
            ],
            [
                'text' => 'Accountants & Advisors Directory',
                'url'  => 'https://brixx.com/brixx-partnerships/accountants-advisors-consultants/',
            ]
        ];
        // Insert new links after the first link
        array_splice($links, 1, 0, $new_links);
    }

    if (is_singular('software-integration')) {
        $new_links = [
            [
                'text' => 'Brixx Partnerships',
                'url'  => 'https://brixx.com/brixx-partnerships/',
            ],
            [
                'text' => 'Software Integration',
                'url'  => 'https://brixx.com/resources/software-integrations/', 
            ]
        ];
        // Insert new links after the first link
        array_splice($links, 1, 0, $new_links);
    }

    if (is_singular('brixx_news')) {
        $new_links = [
            [
                'text' => 'Brixx News',
                'url'  => 'https://brixx.com/brixx-news/',
            ]
        ];
        // Insert new link after the first link
        array_splice($links, 1, 0, $new_links);
    }

    return $links;
}

// HOME VIDEO JS PATCH
function add_video_script_to_footer() {
    global $is_hero_video_loaded;

    // Check if the hero-video template part has been loaded
    if (!empty($is_hero_video_loaded)) {
        ?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videoContainers = document.querySelectorAll(".video");

            videoContainers.forEach(container => {
                const video = container.querySelector("video");
                const source = video.querySelector("source[data-src]");
                video.muted = true;  // Mute the video initially to facilitate autoplay

                // Setup IntersectionObserver to lazy load the video
                const options = {
                    rootMargin: '0px',
                    threshold: 0.25
                };

                let observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            if (!source.src) {  // Check if source hasn't already been set
                                source.src = source.dataset.src;
                                video.load();
                                video.play().then(() => {
                                    console.log("Autoplay started successfully for video id: " + video.id);
                                    video.closest(".video").classList.add("video-active");  // Mark as active
                                }).catch(error => {
                                    console.log("Autoplay was prevented for video id: " + video.id + "; Error: " + error.message);
                                    // Autoplay policy might prevent this if the video isn't muted
                                });
                                observer.unobserve(entry.target);  // Stop observing once loaded
                            }
                        }
                    });
                }, options);

                observer.observe(video);  // Start observing

                // Add click event listener to each video container
                container.addEventListener("click", function() {
                    if (container.classList.contains("video-active")) {
                        video.pause();
                        container.classList.remove("video-active");
                    } else {
                        const allVideos = document.querySelectorAll(".video video");
                        allVideos.forEach(v => {
                            v.pause();  // Pause all other videos
                            v.closest(".video").classList.remove("video-active");  // Remove 'video-active' from all containers
                        });
                        video.muted = false;  // Unmute the current video on user interaction
                        container.classList.add("video-active");
                        video.play().catch(error => {
                            console.log("Error playing video: " + error.message);
                            video.muted = true;  // Mute and try playing again if there was an error
                            video.play();
                        });
                    }
                });
            });
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'add_video_script_to_footer');

//GET BRIXX FREE IN ARTICLES SHORTCODE
function get_brixx_free(){
return '<img class="get-brixx-free-cta" style="margin-top:1vw;" src="https://brixx.com/wp-content/uploads/2021/01/Plan-Your-Cash-Flow.jpg" alt="Plan Your Cash Flow" width="1000" height="500" class="aligncenter size-full wp-image-10484"/></br><center><a class="btn btn--orange" href="https://app.brixx.com/sign-up/trial">Start your free trial</a></center>';
}
add_shortcode('get_brixx', 'get_brixx_free');

//CANCELLLATION SURVEY PAGE CUSTOM EVENTLISTENER FOR SUBMISSION
function custom_footer_script_for_page_15914() {
    if ( is_page( 15914 ) ) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendlyLink = document.getElementById('calendly-link');

                if (!calendlyLink) {
                    console.log('Calendly link not found.');
                    return;
                }

                console.log('Calendly link found.');

                calendlyLink.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    console.log('Calendly link clicked.');

                    var form = document.querySelector('.wpcf7-form');
                    if (form) {
                        console.log('Form found, attempting to submit...');
                        form.submit();
                    } else {
                        console.log('Form not found.');
                    }

                    console.log('Opening Calendly link in new tab...');
                    window.open(this.href, '_blank');
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'custom_footer_script_for_page_15914' );

//CUSTOM CTA SHORTCODE FUNCTIONALITY
function custom_acf_shortcodes($atts) {
    $all_shortcodes = get_field('shortcode_repeater', 'option');
    
    if ($all_shortcodes) {
        foreach ($all_shortcodes as $item) {
            $shortcode_name = $item['shortcode_field'];
            $content = $item['content_field'];
            if (isset($atts['name']) && $atts['name'] === $shortcode_name) {

                $utm_campaign = isset($item['utm_campaign_field']) ? $item['utm_campaign_field'] : '';
                $link_url = isset($item['link_field']['url']) ? $item['link_field']['url'] : '#';
                $link_text = isset($item['link_field']['title']) ? $item['link_field']['title'] : 'Link';

                $button_link = sprintf(
                    '<div class="acf-cta-button-wrapper"><center><a class="btn btn--orange" href="%s?utm_source=brixx-website&utm_medium=cta&utm_campaign=%s">%s</a></center></div>',
                    esc_url($link_url),
                    esc_attr($utm_campaign),
                    esc_html($link_text)
                );

                return sprintf(
                    '<div class="acf-cta-content-wrapper"><div class="acf-cta-content">%s</div>%s</div>',
                    $content,
                    $button_link
                );
            }
        }
    }
    return '';
}
add_shortcode('acf_content', 'custom_acf_shortcodes');

function custom_search_help_centre_query($query) {
    if ($query->is_main_query() && !is_admin() && $query->get('search_help_centre')) {
        $search_term = $query->get('search_help_centre');

        $meta_query = [
            'relation' => 'OR',
            [
                'key' => 'post-builder_%_content',
                'value' => $search_term,
                'compare' => 'LIKE'
            ]
        ];

        $query->set('meta_query', $meta_query);
        $query->set('post_type', 'help-centre'); 
        $query->set('s', $search_term);
    }
}
add_action('pre_get_posts', 'custom_search_help_centre_query');


/**
 * Get an excerpt around the first occurrence of the search term within a string.
 */
function get_search_excerpt($content, $search_term) {
    $pos = strpos(strtolower($content), strtolower($search_term));
    if ($pos !== false) {
        $start = max(0, $pos - 40); // Adjust to get more/less context
        $end = min(strlen($content), $pos + strlen($search_term) + 40); // Adjust similarly
        $excerpt = substr($content, $start, $end - $start);
         return '...' . esc_html(wp_strip_all_tags(trim($excerpt))) . '...';
    }
    return '';
}

//DATE MODIFIED IN SIDEBAR ON SINGLE EDIT PAGE
add_action('add_meta_boxes', 'add_modified_date_meta_box');
function add_modified_date_meta_box() {
    add_meta_box('post_modified_date', 'Date Modified', 'display_modified_date_meta_box', 'post', 'side', 'high');
}

function display_modified_date_meta_box($post) {
    echo '<p>Last Modified: ' . get_the_modified_date('F j, Y \a\t g:i a', $post->ID) . '</p>';
}

//DATE MODIFIED ON POSTS PAGE AND SORTABLE
// Add a new column for the modified date
function add_modified_date_column($columns) {
    $columns['modified_date'] = __('Modified Date');
    return $columns;
}
add_filter('manage_posts_columns', 'add_modified_date_column');

// Populate the modified date column
function show_modified_date_column($column_name, $post_id) {
    if ($column_name == 'modified_date') {
        $modified_date = get_the_modified_date('Y/m/d', $post_id);
        echo $modified_date;
    }
}
add_action('manage_posts_custom_column', 'show_modified_date_column', 10, 2);

// Make the modified date column sortable
function make_modified_date_column_sortable($columns) {
    $columns['modified_date'] = 'modified_date';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_modified_date_column_sortable');

// Set the query to sort by the modified date
function sort_modified_date_column($query) {
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('modified_date' == $orderby) {
        $query->set('orderby', 'modified');
    }
}
add_action('pre_get_posts', 'sort_modified_date_column');

// Temporarily Remove Success Stories
function remove_success_story_menu_item() {
    remove_menu_page('edit.php?post_type=success-story');
}
add_action('admin_menu', 'remove_success_story_menu_item', 999);