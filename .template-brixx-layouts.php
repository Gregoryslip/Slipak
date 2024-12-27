<?php
// Correct field key and group ID
$flexible_field_key = 'field_631f7a5f79f87';
$layouts_used = [];

// Get all pages and custom post type entries
$args = [
    'post_type' => ['page', 'software-integration'], // Corrected CPT name
    'posts_per_page' => -1, // Get all posts
];

$posts = get_posts($args);

// Debug: Output number of posts found
echo "<p>Number of posts found: " . count($posts) . "</p>";

foreach ($posts as $post) {
    // Check if the post has the flexible content field
    if (have_rows($flexible_field_key, $post->ID)) {
        // Debug: Output the post ID being processed
        echo "<p>Processing post ID: " . $post->ID . " (" . get_the_title($post->ID) . ")</p>";
        while (have_rows($flexible_field_key, $post->ID)) {
            the_row();
            $layout = get_row_layout();
            // Debug: Output the layout name being added
            echo "<p>Found layout: " . $layout . " in post ID: " . $post->ID . "</p>";
            if (!isset($layouts_used[$layout])) {
                $layouts_used[$layout] = [];
            }
            $layouts_used[$layout][] = $post->ID;
        }
    } else {
        // Debug: Output if no flexible content is found in the post
        echo "<p>No flexible content found in post ID: " . $post->ID . "</p>";
    }
}

// Fetch the field group data
$field_group = acf_get_field_group('group_631f7a54e9b5e');

if ($field_group) {
    echo "<p>Field group found: {$field_group['title']}</p>";
    $fields = acf_get_fields($field_group);

    if ($fields) {
        foreach ($fields as $field) {
            if ($field['key'] === $flexible_field_key && $field['type'] === 'flexible_content') {
                foreach ($field['layouts'] as $layout) {
                    $all_layouts[$layout['name']] = $layout['label'];
                    // Debug: Output each layout name and label
                    echo "<p>Found layout in field group: {$layout['name']} - {$layout['label']}</p>";
                }
            }
        }
    } else {
        echo "<p>No fields found in the field group.</p>";
    }
} else {
    echo "<p>Field group not found!</p>";
}

// Debug: Output all layouts found in the group
echo "<h2>Available Layouts in 'page-builder'</h2>";
echo "<ul>";
if (!empty($all_layouts)) {
    foreach ($all_layouts as $layout_name => $layout_label) {
        echo "<li>{$layout_label} ({$layout_name})</li>";
    }
} else {
    echo "<li>No layouts found.</li>";
}
echo "</ul>";

// Output the results
echo "<h2>Layout Usage Report</h2>";
echo "<ul>";
foreach ($all_layouts as $layout_name => $layout_label) {
    echo "<li><strong>{$layout_label} ({$layout_name})</strong>: ";
    if (isset($layouts_used[$layout_name])) {
        echo "Used in posts: " . implode(', ', $layouts_used[$layout_name]);
    } else {
        echo "<span style='color:red;'>Not used in any post.</span>";
    }
    echo "</li>";
}
echo "</ul>";
