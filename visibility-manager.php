<?php
/**
 * Plugin Name: Elementor - Visibility Manager for Elementor
 * Description: Adds a widget to control visibility of containers
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: visibility-manager
 */

if (!defined('ABSPATH')) {
    exit;
}

final class Visibility_Manager {
    private static $_instance = null;

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function register_widgets($widgets_manager) {
        require_once(__DIR__ . '/widgets/visibility-control.php');
        $widgets_manager->register(new \Visibility_Control_Widget());
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'visibility-manager',
            plugins_url('assets/js/visibility-manager.js', __FILE__),
            ['jquery'],
            '1.0.0',
            true
        );

        wp_enqueue_style(
            'visibility-manager',
            plugins_url('assets/css/visibility-manager.css', __FILE__),
            [],
            '1.0.0'
        );
    }
}

Visibility_Manager::instance(); 