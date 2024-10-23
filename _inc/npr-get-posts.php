<?php
/**
 * Get posts based on specified criteria
 *
 * @param string $orderby The field to order posts by
 * @param string $order The sort order (ASC/DESC)
 * @return string HTML markup for the posts list
 */
function npr_get_posts(string $orderby = 'ID', string $order = 'DESC'): string
{
    $args = array(
        'post_type' => array('post', 'tech'),
        'post_status' => 'publish',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => 5
    );
    // Allow other developers to modify the query arguments
    $args = apply_filters('npr_query_args', $args);

    $query = new WP_Query($args);
    $output = '';

    if ($query->have_posts()) {
        $output .= '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= sprintf(
                '<li><a href="%s">%s</a></li>',
                esc_url(get_the_permalink()),
                esc_html(get_the_title())
            );
        }
        $output .= '</ul>';
        wp_reset_postdata();
    } else {
        $output = '<p>' . esc_html__('No posts found', 'npr-posts') . '</p>';
    }

    return $output;
}
