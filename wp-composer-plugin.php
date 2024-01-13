<?php

/**
 * Plugin Name: WP Composer
 * Description: Composer plugin for WordPress
 * Version: 0.0.1
 *
 */

// If this file is called directly, abort.
defined('ABSPATH') or die('No script kidd!');

// Require Composer Autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation.
 */

function activate_wp_composer_plugin()
{
    Inc\Base\Activate::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wp_composer_plugin()
{
    Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_wp_composer_plugin');
register_deactivation_hook(__FILE__, 'deactivate_wp_composer_plugin');

/**
 * Initialize all core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
