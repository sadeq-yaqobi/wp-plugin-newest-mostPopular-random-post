<?php
/**
 * Plugin Name: NPR Posts Plugin
 * Plugin URI: http://siteyar.net/plugins/
 * Description: A WordPress plugin for displaying new, popular, and random posts in a tabbed interface
 * Author: Sadeq Yaqobi
 * Version: 1.0.0
 * License: GPLv2 or later
 * Author URI: http://siteyar.net/sadeq-yaqobi/
 * Text Domain: npr-posts
 */
// Prevent direct access to this file
defined('ABSPATH') || exit;

// Define plugin constants
define('NPR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NPR_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Register and enqueue frontend assets
 */
function npr_register_assets() {
    // Register and enqueue CSS
    wp_register_style(
        'npr-style',
        NPR_PLUGIN_URL . 'assets/front/css/style.css',
        array(),
        '1.0.0'
    );
    wp_enqueue_style('npr-style');

    // Register and enqueue JavaScript
    wp_register_script(
        'npr-main',
        NPR_PLUGIN_URL . 'assets/front/js/main.js',
        array('jquery'),
        '1.0.0',
        array(
            'strategy' => 'async',
            'in_footer' => true
        )
    );
    wp_enqueue_script('npr-main');
}
add_action('wp_enqueue_scripts', 'npr_register_assets');

// Include frontend view file for non-admin pages
if (!is_admin()) {
    include_once NPR_PLUGIN_DIR . 'view/front/npr-tab.php';

    // Enable shortcodes in widgets
    add_filter('widget_text', 'do_shortcode', 11);
}