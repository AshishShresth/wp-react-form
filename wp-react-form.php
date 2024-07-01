<?php
/**
 * Plugin Name:     WP React Form
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     wp-react-form
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_React_Form
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


add_action('admin_menu', 'wp_react_form_menu');

function wp_react_form_menu() {
    add_menu_page(
        'WP React Form Plugin', // Page title
        'WP React Form',    // Menu title
        'manage_options',   // Capability
        'wp-react-form', // Menu slug
        'wp_react_form_page', // Function to display page content
        'dashicons-admin-generic', // Icon URL
        6                    // Position
    );
}

function wp_react_form_page() {
    printf(
        '<div class="wrap" id="wp-react-form">%s</div>',
        esc_html__( 'Loading…', 'wp-react-form' )
    );
}

// Enqueue scripts
add_action('admin_enqueue_scripts', 'wp_react_form_enqueue_scripts');

function wp_react_form_enqueue_scripts($hook_suffix) {
    if("toplevel_page_wp-react-form" !== $hook_suffix) {
        return;
    }

    $asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

    if ( ! file_exists( $asset_file ) ) {
        return;
    }
    
    $asset = include $asset_file;
    wp_enqueue_script(
        'wp-react-form-script',
        plugins_url( 'build/index.js', __FILE__ ),
        $asset['dependencies'],
        $asset['version'],
        true
    );
}