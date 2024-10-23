<?php
/**
 * Shortcode callback function for the tabbed interface
 */
include_once NPR_PLUGIN_DIR . '_inc/npr-get-posts.php';
function npr_layout() {
    ob_start();
    ?>
    <div class="wrap">
        <ul class="tabs group">
            <li><a class="active" href="#/one"><?php esc_html_e('جدیدترین‌ها', 'npr-posts'); ?></a></li>
            <li><a href="#/two"><?php esc_html_e('محبوب‌ترین‌ها', 'npr-posts'); ?></a></li>
            <li><a href="#/three"><?php esc_html_e('مطالب تصادفی', 'npr-posts'); ?></a></li>
        </ul>
        <div id="content">
            <div id="one"><?php echo npr_get_posts('ID', 'DESC'); ?></div>
            <div id="two"><?php echo npr_get_posts('comment_count', 'DESC'); ?></div>
            <div id="three"><?php echo npr_get_posts('rand',''); ?></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('npr_tab', 'npr_layout');